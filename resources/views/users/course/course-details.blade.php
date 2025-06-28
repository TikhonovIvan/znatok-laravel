@extends('layouts.app')


@section('title', 'Детали курса | Znatok-KG ')

@section('content')

    <div class="blogarea__2 sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9">
                    <div
                        class="blogarae__img__2 course__details__img__2"
                        data-aos="fade-up"
                    >
                        <img loading="lazy" src="{{asset('uploads/' . $courseInfo->cover)}}" alt="blog" style="object-fit: fill; height: 500px"/>
                    </div>

                    <div class="blog__details__content__wraper">
                        <div class="course__button__wraper" data-aos="fade-up">
                            <div class="course__button">
                                <a href="#" style="width: 250px">{{$courseInfo->category}}</a>
                            </div>
                            <div class="course__date">
                                <p>Последнее обновление: <span>{{$courseInfo->updated_at->format('d.m.Y')}}</span></p>
                            </div>
                        </div>
                        <div class="course__details__heading" data-aos="fade-up">
                            <h3>{{$courseInfo->title}}</h3>
                        </div>
                        <div class="course__details__heading" data-aos="fade-up">
                            <h5>Код курса:  {{$courseInfo->course_code}} </h5>
                        </div>

                        <div class="course__details__paragraph" data-aos="fade-up">
                            <p>{{ Str::limit($courseInfo->short_description, 150) }}</p>
                        </div>

                        <div class="course__details__tab__wrapper" data-aos="fade-up">
                            <div class="row">
                                <div class="col-xl-12">
                                    <ul
                                        class="nav course__tap__wrap"
                                        id="myTab"
                                        role="tablist"
                                    >
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="single__tab__link active"
                                                data-bs-toggle="tab"
                                                data-bs-target="#projects__two"
                                                type="button"
                                            >
                                                <i class="icofont-book-alt"></i>Учебный план
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="single__tab__link"
                                                data-bs-toggle="tab"
                                                data-bs-target="#projects__one"
                                                type="button"
                                            >
                                                <i class="icofont-paper"></i>Описание
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            @can('teacher')
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="d-flex flex-wrap gap-2">
                                        <div class="course__summery__button">
                                            <a class="default__button" href="{{route('course.edit',$courseInfo->id)}}"
                                            >Редактировать курс</a
                                            >
                                        </div>
                                        <div class="course__summery__button">
                                            <a class="default__button" href="{{route('course.create-chapter',$courseInfo->id )}}"
                                            >Создать раздел</a
                                            >
                                        </div>
                                        <div class="course__summery__button">
                                            <a
                                                class="default__button"
                                                href="create-lesson-material.html"
                                            >
                                                Создать лекцию
                                            </a>
                                        </div>
                                        <div class="course__summery__button">
                                            <a class="default__button" href="create-video.html">
                                                Добавить видео
                                            </a>
                                        </div>
                                        <div class="course__summery__button">
                                            <a class="default__button" href="create-test.html">
                                                Создать тест
                                            </a>
                                        </div>
                                        <div class="course__summery__button">
                                            <a
                                                class="default__button"
                                                href="create-test-questions.html"
                                            >
                                                Вопросы к тесту
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan



                            <div
                                class="tab-content tab__content__wrapper"
                                id="myTabContent"
                            >
                                <div
                                    class="tab-pane fade active show"
                                    id="projects__two"
                                    role="tabpanel"
                                    aria-labelledby="projects__two"
                                >
                                    <div
                                        class="accordion content__cirriculum__wrap"
                                        id="accordionExample"
                                    >

                                        @forelse($courseInfo->sections as $section)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSection{{ $section->id }}">
                                                    <button
                                                        class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSection{{ $section->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseSection{{ $section->id }}"
                                                    >
                                                        {{ $section->title }}
                                                    </button>
                                                </h2>
                                                <div
                                                    id="collapseSection{{ $section->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSection{{ $section->id }}"
                                                    data-bs-parent="#accordionExample"
                                                >
                                                    <div class="accordion-body">
                                                        <div class="scc__wrap">
                                                            <div class="scc__info">
                                                                <i class="icofont-file-text"></i>
                                                                <h5>Материалы этого раздела будут добавлены позже</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>Разделов пока нет.</p>
                                        @endforelse


                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button
                                                    class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo"
                                                    aria-expanded="false"
                                                    aria-controls="collapseTwo"
                                                >
                                                    Раздел первый
                                                </button>
                                            </h2>
                                            <div
                                                id="collapseTwo"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo"
                                                data-bs-parent="#accordionExample"
                                            >
                                                <div class="accordion-body">
                                                    <div class="scc__wrap">
                                                        <div class="scc__info">
                                                            <i class="icofont-video-alt"></i>
                                                            <h5>
                                                                <span>Video :</span> Lorem ipsum dolor sit
                                                                amet.
                                                            </h5>
                                                        </div>
                                                        <div class="scc__meta">
                                                            <!-- <span class="time"> <i class="icofont-clock-time"></i> 22 minutes</span> -->
                                                            <a href="lesson.html"
                                                            ><span><i class="icofont-lock"></i></span
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <div class="scc__wrap">
                                                        <div class="scc__info">
                                                            <i class="icofont-video-alt"></i>
                                                            <h5>
                                                                <span>Video :</span> Lorem ipsum dolor sit
                                                                amet.
                                                            </h5>
                                                        </div>
                                                        <div class="scc__meta">
                                                            <!-- <span class="time"> <i class="icofont-clock-time"></i> 05 minutes</span> -->
                                                            <a href="lesson.html"
                                                            ><span><i class="icofont-lock"></i></span
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <div class="scc__wrap">
                                                        <div class="scc__info">
                                                            <i class="icofont-video-alt"></i>
                                                            <h5>
                                                                <span>Video :</span> Lorem ipsum dolor sit
                                                                amet.
                                                            </h5>
                                                        </div>
                                                        <div class="scc__meta">
                                                            <!-- <span class="time"> <i class="icofont-clock-time"></i> 10 minutes</span> -->
                                                            <a href="lesson.html"
                                                            ><span><i class="icofont-lock"></i></span
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <div class="scc__wrap">
                                                        <div class="scc__info">
                                                            <i class="icofont-video-alt"></i>
                                                            <h5>
                                                                <span>Video :</span> Lorem ipsum dolor sit
                                                                amet.
                                                            </h5>
                                                        </div>
                                                        <div class="scc__meta">
                                                            <!-- <span class="time"> <i class="icofont-clock-time"></i> 15 minutes</span> -->
                                                            <a href="lesson.html"
                                                            ><span><i class="icofont-lock"></i></span
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <div class="scc__wrap">
                                                        <div class="scc__info">
                                                            <i class="icofont-video-alt"></i>
                                                            <h5>
                                                                <span>Video :</span> Lorem ipsum dolor sit
                                                                amet.
                                                            </h5>
                                                        </div>
                                                        <div class="scc__meta">
                                                            <!-- <span class="time"> <i class="icofont-clock-time"></i> 08 minutes</span> -->
                                                            <a href="lesson.html"
                                                            ><span><i class="icofont-lock"></i></span
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <div class="scc__wrap">
                                                        <div class="scc__info">
                                                            <i class="icofont-file-text"></i>
                                                            <h5><span>Lesson 03 Exam :</span></h5>
                                                        </div>
                                                        <div class="scc__meta">
                                  <span
                                  ><i class="icofont-lock"></i> 20 Ques</span
                                  >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="projects__one"
                                    role="tabpanel"
                                    aria-labelledby="projects__one"
                                >
                                    <div class="experence__heading">
                                        <h5>Описание курса</h5>
                                    </div>
                                    <div class="experence__description">
                                        <p class="description__1">
                                            {{$courseInfo->short_description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3">
                    <div class="course__details__sidebar">
                        <div class="event__sidebar__wraper" data-aos="fade-up">
                            <div
                                class="blogarae__img__2 course__details__img__2"
                                data-aos="fade-up"
                            >
                                <img loading="lazy" src="{{asset('uploads/' . $courseInfo->cover)}}" alt="blog"/>
                            </div>

                            <div class="course__summery__button">
                                <a class="default__button" href="lesson.html"
                                >Поступить на курс</a
                                >
                            </div>

                            <div class="course__summery__lists">
                                <ul>
                                    <li>
                                        <div class="course__summery__item">
                                     <span class="sb_label">Инструктор:</span>
                                            <span class="sb_content">{{$courseInfo->teacher->first_name}} {{$courseInfo->teacher->last_name}}</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="course__summery__item">
                          <span class="sb_label">Дата создание</span
                          ><span class="sb_content">{{$courseInfo->created_at->format('d.m.Y')}}</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="course__summery__item">
                          <span class="sb_label">На курсе</span
                          ><span class="sb_content">100 сту.</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="course__summery__item">
                          <span class="sb_label">Лекций</span
                          ><span class="sb_content">30</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
