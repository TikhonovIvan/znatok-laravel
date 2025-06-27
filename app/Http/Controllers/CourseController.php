<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $addedCourses = collect(); // пустая коллекция на случай если не студент

        if ($user->role === 'student') {
            $addedCourses = $user->courses()->with('teacher')->get();
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
                'addedCourses' => $addedCourses // обязательно передаем
            ]);
        }

        return view('users.course.index-course', [
            'addedCourses' => $addedCourses
        ]);
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
     Страница детали курса и создание лекций, тестов, разделов
     */
    public function courseDetails(string $id)
    {
        $courseInfo = Course::query()->findOrFail($id);
        return view('users.course.course-details', [
            'courseInfo' => $courseInfo,
        ]);

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::query()->findOrFail($id);
        return view('users.course.edit-course', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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

        $user = auth()->user();

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Вы уже добавили этот курс');
        }

        $user->courses()->attach($course->id);

        return back()->with('success', 'Курс успешно добавлен');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
