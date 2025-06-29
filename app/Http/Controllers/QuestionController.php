<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function create($course)
    {
        $tests = Test::whereHas('section', function ($query) use ($course) {
            $query->where('course_id', $course);
        })->get();

        return view('users.test.create-test-questions', [
            'course' => $course,     // здесь $course — это строка
            'tests' => $tests,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_id' => 'required|exists:tests,id',
            'questions' => 'array',
            'questions.*.text' => 'string',
            'questions.*.answers' => 'array|min:1',
            'questions.*.answers.*.text' => 'string',
            'questions.*.answers.*.is_correct' => 'boolean',
        ]);

        foreach ($validated['questions'] as $questionData) {
            $question = Question::create([
                'test_id' => $validated['test_id'],
                'text' => $questionData['text']
            ]);

            foreach ($questionData['answers'] as $answerData) {
                $question->answers()->create($answerData);
            }
        }

        $test = Test::findOrFail($validated['test_id']);
        $courseId = $test->section->course_id;

        return redirect()
            ->route('course.details-course', $courseId)
            ->with('success', 'Вопросы успешно сохранены');
    }
}
