<?php

namespace App\Http\Controllers;

use App\Models\Lectures;
use App\Models\Section;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($courseId)
    {
        $sections = Section::where('course_id', $courseId)->get();

        return view('users.lesson.create-lesson-material', [
            'sections' => $sections,
            'courseId' => $courseId,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' =>['required','string', 'max:255'],
            'section_id' => ['required'],
            'content' => ['required'],
        ]);

        Lectures::query()->create($validated);
        $section = Section::findOrFail($validated['section_id']);


        return redirect()->route('course.details-course', $section->course_id)->with('success', 'Лекционный материала добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = Lectures::query()->findOrFail($id);
        return view('users.lesson.show-lesson-material', [
            'lesson' => $lesson,
        ]);

    }

    /*Страница редактирование лекции*/
    public function edit(string $id)
    {
        $lesson = Lectures::query()->findOrFail($id);
        $sections = Section::where('course_id', $id)->get();
        return view('users.lesson.edit-lesson-material', [
            'lesson' => $lesson,
            'sections' => $sections,
        ]);

    }

    /*Обновление лекции*/
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'section_id' => ['required', 'exists:sections,id'],
            'content' => ['required'],
        ]);

        $lesson = Lectures::findOrFail($id);

        $lesson->update([
            'title' => $validated['title'],
            'section_id' => $validated['section_id'],
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('course.details-course', $lesson->section->course_id)
            ->with('success', 'Лекция успешно обновлена');
    }

    /*Удалить лекцию*/
    public function destroy(string $id)
    {
        $lesson = Lectures::findOrFail($id);

        $courseId = $lesson->section->course_id; // чтобы после удаления сделать редирект обратно к курсу

        $lesson->delete();

        return redirect()
            ->route('course.details-course', $courseId)
            ->with('success', 'Лекция успешно удалена');
    }
}
