@extends('layouts.app')


@section('title', 'Результат теста | Znatok-KG ')
@section('content')
    <div class="container mt-5">
        <div class="lesson__quiz__wrap">
            <h3>Результат теста</h3>
            <p>Вы правильно ответили на <strong>{{ $correctCount }}</strong> из <strong>{{ $totalQuestions }}</strong> вопросов.</p>

            <a href="{{ route('course.test.show', $test->id) }}" class="default__button mb-4">
                Пройти заново
            </a>

            @foreach($test->questions as $qIndex => $question)
                <div class="quiz__single__attemp mb-4">
                    <hr />
                    <h4>{{ $qIndex + 1 }}. {{ $question->text }}</h4>
                    <div class="row">
                        @foreach($question->answers as $answer)
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        disabled
                                        @if($answer->is_correct) checked @endif
                                    />
                                    <label
                                        class="form-check-label"
                                        style="color: {{ $answer->is_correct ? 'green' : 'inherit' }}"
                                    >
                                        {{ $answer->text }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
