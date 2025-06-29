<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $addedCourses = collect(); // на всякий случай пустая коллекция по умолчанию

        if ($user->role === 'student') {
            $addedCourses = $user->courses()
                ->where('status', 'publish') // показываем только опубликованные
                ->with('teacher')
                ->get();

            return view('users.course.index-course', [
                'addedCourses' => $addedCourses,
                'publishedCourses' => collect(), // чтобы Blade не ругался
                'pendingCourses' => collect(),
                'draftCourses' => collect(),
            ]);
        }

        if ($user->role === 'teacher') {
            $publishedCourses = Course::where('teacher_id', $user->id)
                ->where('status', 'publish')
                ->get();

            $pendingCourses = Course::where('teacher_id', $user->id)
                ->where('status', 'pending')
                ->get();

            $draftCourses = Course::where('teacher_id', $user->id)
                ->where('status', 'draft')
                ->get();

            return view('users.course.index-course', [
                'publishedCourses' => $publishedCourses,
                'pendingCourses' => $pendingCourses,
                'draftCourses' => $draftCourses,
                'addedCourses' => $addedCourses // передаем пустую, чтобы Blade не падал
            ]);
        }

        // если вообще непонятно кто — редирект
        return redirect()->back()->with('error', 'Недостаточно прав');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.course.create-course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'category' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:1000'],
            'status' => ['required', 'in:draft,pending,publish'],
            'course_code' => ['required', 'string', 'max:255', 'unique:courses,course_code'],
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('courses', 'public_uploads');
        }

        $validated['teacher_id'] = auth()->id();

        Course::query()->create($validated);

        return redirect()
            ->route('course.index')
            ->with('success', 'Курс успешно создан');
    }


    /*
     Страница детали курса и создание лекций, тестов, разделов выводит информацию о куре

    тут выводит ифнормацию о разделах и содержание в разделах лекции и т.д
     */
    public function courseDetails(string $id)
    {
        $courseInfo = Course::with(['sections.lectures', 'sections.videos', 'sections.tests', 'students'])
            ->findOrFail($id);


        $totalLectures = $courseInfo->sections->sum(fn($section) => $section->lectures->count());
        $totalStudents = $courseInfo->students->count();

        // проверить, есть ли этот пользователь в списке студентов курса
        $hasAccess = $courseInfo->students->contains(auth()->id());

        return view('users.course.course-details', [
            'courseInfo'      => $courseInfo,
            'totalLectures'   => $totalLectures,
            'totalStudents'   => $totalStudents,
            'hasAccess'       => $hasAccess,  // передаем в Blade
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    /*Страница обновления курса*/
    public function edit(string $id)
    {
        $course = Course::query()->findOrFail($id);
        return view('users.course.edit-course', [
            'course' => $course,
        ]);
    }


    /*Обновить курс*/
    public function update(Request $request, string $id)
    {

        $course = Course::query()->findOrFail($id);
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'category' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:1000'],
            'status' => ['required', 'in:draft,pending,publish'],
            'course_code' => ['required', 'string', 'max:255'],
        ]);

        $course->update($validated);
        return redirect()->route('course.details-course', $course->id)->with('success', 'Данные курса обновлены');

    }



    public function addCourseByCode(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string'
        ]);

        $course = Course::where('course_code', $request->course_code)->first();

        if (!$course) {
            return back()->with('error', 'Курс с таким кодом не найден');
        }

        // проверка статуса
        if ($course->status !== 'publish') {
            return back()->with('error', 'Курс еще находится в разработке и недоступен для добавления');
        }

        $user = auth()->user();

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Вы уже добавили этот курс');
        }

        $user->courses()->attach($course->id);

        return back()->with('success', 'Курс успешно добавлен');
    }


    /*Удалить полстью курс со ввсеми данными*/
    public function destroy($id)
    {
        $user = auth()->user();

        // проверяем, что учитель действительно владеет этим курсом
        $course = Course::where('id', $id)->where('teacher_id', $user->id)->first();

        if (!$course) {
            return back()->with('error', 'Курс не найден или вы не имеете прав на его удаление');
        }

        $course->delete();

        return back()->with('success', 'Курс успешно удален');
    }


    /*Покинуть курс студенту    */
    public function leaveCourse(Request $request, $courseId)
    {
        $user = auth()->user();

        // проверка, что студент реально подписан на этот курс
        if (!$user->courses()->where('course_id', $courseId)->exists()) {
            return back()->with('error', 'Вы не записаны на этот курс');
        }

        // отвязываем
        $user->courses()->detach($courseId);

        return back()->with('success', 'Вы успешно покинули курс');
    }


    /*Форма создание раздела*/
    public function createChapter(string $id)
    {
        $courseId = Course::query()->findOrFail($id)->id;
        return view('users.course.create-сhapter', [
            'courseId' => $courseId
        ]);
    }

    /*Метод создание раздела*/
    public function storeChapter(Request $request, string $id)
    {
        $courseId = Course::query()->findOrFail($id)->id;
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id'
        ]);

        Section::query()->create([
            'title' => $request->title,
            'course_id' => $request->course_id
        ]);

        return redirect()->route('course.details-course', $courseId )->with('success', 'Раздел успешно создан');
    }

    /*Форма редактирование раздела */
    public function editChapter(string $id)
    {
        $chapter = Section::query()->findOrFail($id);
        return view('users.course.edit-сhapter', [
            'chapter' =>  $chapter
        ]);
    }

    /*Метод обновления раздела*/
    public function updateChapter(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id'
        ]);

        $section = Section::findOrFail($id);

        $section->update([
            'title' => $request->title,
            'course_id' => $request->course_id
        ]);

        return redirect()
            ->route('course.details-course', $request->course_id)
            ->with('success', 'Раздел успешно обновлён');
    }



    public function destroyChapter($id)
    {
        $section = Section::findOrFail($id);

        $courseId = $section->course_id; // чтобы после удаления вернуть пользователя на страницу курса

        $section->delete();

        return redirect()
            ->route('course.details-course', $courseId)
            ->with('success', 'Раздел успешно удалён');
    }

}
