<?php

namespace App\Http\Controllers;

use App\Models\Answer;
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

// QuestionController.php

    public function edit($testId)
    {
        // подтягиваем тест и все вопросы с ответами
        $test = Test::with('questions.answers')->findOrFail($testId);

        return view('users.test.edit-test-questions', [
            'test' => $test,
        ]);
    }

    public function update(Request $request, $testId)
    {
        // 1) Удаление вопросов с ответами (через каскад)
        if ($request->has('deleted_questions') && is_array($request->deleted_questions) && count($request->deleted_questions) > 0) {
            Question::whereIn('id', $request->deleted_questions)->delete();
        }

        // 2) Обновление и создание вопросов и ответов
        if ($request->has('questions')) {
            $validated = $request->validate([
                'questions' => 'required|array',
                'questions.*.text' => 'required|string',
                'questions.*.answers' => 'required|array',
                'questions.*.answers.*.text' => 'required|string',
            ]);

            foreach ($request->questions as $questionData) {
                if (isset($questionData['id'])) {
                    // Обновление существующего вопроса
                    $question = Question::find($questionData['id']);
                    if ($question) {
                        $question->update(['text' => $questionData['text']]);

                        foreach ($questionData['answers'] as $answerData) {
                            if (isset($answerData['id'])) {
                                $answer = Answer::find($answerData['id']);
                                if ($answer) {
                                    $answer->update([
                                        'text' => $answerData['text'],
                                        'is_correct' => isset($answerData['is_correct']),
                                    ]);
                                }
                            }
                        }
                    }
                } else {
                    // Создание нового вопроса с ответами
                    $newQuestion = Question::create([
                        'test_id' => $testId,
                        'text' => $questionData['text'],
                    ]);
                    foreach ($questionData['answers'] as $answerData) {
                        $newQuestion->answers()->create([
                            'text' => $answerData['text'],
                            'is_correct' => isset($answerData['is_correct']),
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Вопросы обновлены');
    }




}
