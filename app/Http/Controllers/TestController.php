<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($courseId)
    {
        $sections = Section::where('course_id', $courseId)->get();
        return view('users.test.create-test',[
            'sections' => $sections,
            'courseId' => $courseId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'integer'],
            'section_id' => ['required', 'integer'],
        ]);


        Test::query()->create($validated);

        $section = Section::findOrFail($validated['section_id']);

        return redirect()
            ->route('course.details-course', $section->course_id)
            ->with('success', 'Тест создан успешно');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test = Test::with('section')->findOrFail($id);


        return view('users.test.show-test', [
            'test' => $test,

        ]);
    }

    public function submit(Request $request, $testId)
    {
        $test = Test::with('questions.answers')->findOrFail($testId);

        $correctCount = 0;

        $userAnswers = $request->input('answers', []); // answers[question_id][]

        foreach ($test->questions as $question) {
            $correctAnswers = $question->answers
                ->where('is_correct', true)
                ->pluck('id')
                ->sort()
                ->values();

            $userChecked = collect($userAnswers[$question->id] ?? [])
                ->map(fn($v) => (int)$v)
                ->sort()
                ->values();

            if (
                $correctAnswers->count() &&
                empty(array_diff($correctAnswers->toArray(), $userChecked->toArray())) &&
                empty(array_diff($userChecked->toArray(), $correctAnswers->toArray()))
            ) {
                $correctCount++;
            }
        }

        return view('users.test.result', [
            'test' => $test,
            'correctCount' => $correctCount,
            'totalQuestions' => $test->questions->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test =Test::findOrFail($id);



        $sections = Section::where('course_id', $test->section->course_id)->get();
        return view('users.test.edit-test', [
            'test' => $test,
            'sections' => $sections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $test =Test::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'section_id' => ['required', 'integer'],
        ]);
        $test->update($validated);

        // получаем id курса, чтобы сделать редирект
        $section = Section::findOrFail($validated['section_id']);
        return redirect()
            ->route('course.details-course', $section->course_id)
            ->with('success', 'Тест успешно обновлён');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Test::query()->findOrFail($id);
        // запоминаем id курса через раздел
        $courseId = $test->section->course_id;
        $test->delete();

        return redirect()
            ->route('course.details-course', $courseId)
            ->with('success', 'Тест успешно удалён');

    }
}
