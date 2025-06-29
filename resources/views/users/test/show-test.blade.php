@extends('layouts.app')

@section('title', 'Обзор теста | Znatok-KG')

@section('content')

    <div class="breadcrumbarea" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Тест</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy" class="shape__icon__img shape__icon__img__1" src="{{asset('assets/img/herobanner/herobanner__1.png')}}" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__2" src="{{asset('assets/img/herobanner/herobanner__2.png')}}" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__3" src="{{asset('assets/img/herobanner/herobanner__3.png')}}" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__4" src="{{asset('assets/img/herobanner/herobanner__5.png')}}" alt="photo" />
        </div>
    </div>

    <div class="tution sp_bottom_100 sp_top_100">
        <div class="container-fluid full__width__padding">
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <div class="accordion content__cirriculum__wrap" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Название теста: {{ $test->title }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="scc__wrap">
                                        <div class="scc__info">
                                            <h5><span>Описание теста: {{ $test->description }}</span></h5>
                                        </div>
                                    </div>
                                    <div class="scc__wrap">
                                        <div class="scc__info">
                                            <h5><span>Раздел теста: {{ $test->section->title }}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <form action="{{ route('test.submit', $test->id) }}" method="POST" id="test-form">
                        @csrf

                        <div class="lesson__quiz__wrap">
                            <div class="quiz__single__attemp">
                                <ul>
                                    <li>Вопросов : {{ $test->questions->count() }}</li>
                                </ul>
                                <hr class="hr" />
                            </div>

                            @foreach($test->questions as $qIndex => $question)
                                <div class="quiz__single__attemp">
                                    <hr class="hr" />
                                    <h3>{{ $qIndex + 1 }}. {{ $question->text }}</h3>
                                    <div class="row">
                                        @foreach($question->answers as $answer)
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        name="answers[{{ $question->id }}][]"
                                                        id="question{{ $question->id }}_answer{{ $answer->id }}"
                                                        value="{{ $answer->id }}"
                                                    />
                                                    <label class="form-check-label" for="question{{ $question->id }}_answer{{ $answer->id }}">
                                                        {{ $answer->text }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <br />
                            @endforeach

                            <button class="default__button mt-4" type="submit">
                                Завершить
                                <i class="icofont-long-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
