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
                        <img loading="lazy" src="{{asset('uploads/' . $courseInfo->cover)}}" alt="blog"
                             style="object-fit: fill; height: 500px"/>
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
                        @can('teacher')
                            <div class="course__details__heading" data-aos="fade-up">
                                <h5>Код курса: {{$courseInfo->course_code}} </h5>
                            </div>

                        @endcan

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

                            {{-- Редактирование для перподавателя навигация--}}
                            @can('teacher')
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="d-flex flex-wrap gap-2">
                                            <div class="course__summery__button">
                                                <a class="default__button"
                                                   href="{{route('course.edit',$courseInfo->id)}}"
                                                >Редактировать курс</a
                                                >
                                            </div>
                                            <div class="course__summery__button">
                                                <a class="default__button"
                                                   href="{{route('course.create-chapter',$courseInfo->id )}}"
                                                >Создать раздел</a
                                                >
                                            </div>
                                            <div class="course__summery__button">
                                                <a
                                                    class="default__button"
                                                    href="{{route('course.lesson.create', $courseInfo->id)}}"
                                                >
                                                    Создать лекцию
                                                </a>
                                            </div>
                                            <div class="course__summery__button">
                                                <a class="default__button"
                                                   href="{{route('course.video.create-lesson', $courseInfo->id)}}">
                                                    Добавить видео
                                                </a>
                                            </div>
                                            <div class="course__summery__button">
                                                <a class="default__button"
                                                   href="{{route('course.test.create', $courseInfo->id)}}">
                                                    Создать тест
                                                </a>
                                            </div>
                                            <div class="course__summery__button">
                                                <a
                                                    class="default__button"
                                                    href="{{route('course.test.questions.create',$courseInfo->id)}}"
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

                                                {{-- Название Раздела и редактирование и удаление --}}
                                                <h2 class="accordion-header" id="headingSection{{ $section->id }}">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center accordion-button collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSection{{ $section->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseSection{{ $section->id }}"
                                                        style="cursor:pointer;">
                                                        {{ $section->title }}

                                                        @can('teacher')
                                                            <span
                                                                class=" d-flex justify-content-center align-items-center ms-5 "
                                                                style="width: 40px ; height: 40px ">
                                                                    <a href="{{route('course.edit-chapter',$section->id )}}"
                                                                       class="text-primary" title="Редактировать">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="16"
                                                                             height="16" fill="currentColor"
                                                                             class="bi bi-pencil" viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                                        </svg>
                                                                    </a>
                                                                </span>
                                                            <span
                                                                class=" d-flex justify-content-center align-items-center"
                                                                style="width: 40px ; height: 40px">
                                                                <form
                                                                    action="{{route('course.destroy-chapter',$section->id )}}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Вы уверены, что хотите удалить раздел?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                            class="btn p-0 border-0 bg-transparent text-danger"
                                                                            title="Удалить">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="16"
                                                                             height="16" fill="currentColor"
                                                                             class="bi bi-trash" viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                            <path
                                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1 1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </span>
                                                        @endcan
                                                    </div>
                                                </h2>

                                                {{-- Название леккции и редактирование и удаление --}}
                                                <div
                                                    id="collapseSection{{ $section->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSection{{ $section->id }}"
                                                    data-bs-parent="#accordionExample"
                                                >
                                                    <div class="accordion-body">
                                                        @forelse($section->lectures as $lecture)
                                                            <div class="scc__wrap">
                                                                <div
                                                                    class="scc__info d-flex justify-content-between align-items-center">
                                                                    <i class="icofont-file-text"></i>

                                                                    @can('teacher')
                                                                        {{-- Преподаватель видит всё открыто --}}
                                                                        <a href="{{ route('course.lesson.show', $lecture->id) }}">
                                                                            <h5>{{ $lecture->title }}</h5>
                                                                        </a>
                                                                    @else
                                                                        {{-- Для студента проверяем доступ --}}
                                                                        @if($hasAccess)
                                                                            <a href="{{ route('course.lesson.show', $lecture->id) }}">
                                                                                <h5>{{ $lecture->title }}</h5>
                                                                            </a>
                                                                        @else
                                                                            <h5 class="text-muted"
                                                                                style="cursor: not-allowed;">
                                                                                {{ $lecture->title }}
                                                                            </h5>
                                                                            <i class="icofont-lock"></i>
                                                                        @endif
                                                                    @endcan

                                                                    @can('teacher')
                                                                        <span
                                                                            class="d-flex justify-content-center align-items-center ms-5 bg-top-span"
                                                                            style="width: 40px; height: 40px;">
                                                                                <a href="{{ route('course.lesson.edit', $lecture->id) }}"
                                                                                   class="text-primary"
                                                                                   title="Редактировать">
                                                                                    <svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16"
                                                                                        height="16" fill="currentColor"
                                                                                        class="bi bi-pencil"
                                                                                        viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                                        </svg>
                                                                                </a>
                                                                            </span>
                                                                        <span
                                                                            class="d-flex justify-content-center align-items-center bg-top-span"
                                                                            style="width: 40px; height: 40px;">
                                                                                <form
                                                                                    action="{{ route('course.lesson.delete', $lecture->id) }}"
                                                                                    method="POST"
                                                                                    onsubmit="return confirm('Вы уверены, что хотите удалить лекцию?');">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                            class="btn p-0 border-0 bg-transparent text-danger"
                                                                                            title="Удалить">
                                                                                      <svg
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          width="16" height="16"
                                                                                          fill="currentColor"
                                                                                          class="bi bi-trash"
                                                                                          viewBox="0 0 16 16">
                                                                                              <path
                                                                                                  d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5
                                                                                                   m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5
                                                                                                   m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                                              <path
                                                                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5
                                                                                                   a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6
                                                                                                   a1 1 0 0 1 1 1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4
                                                                                                   L4 4.059V13a1 1 0 0 0 1 1h6
                                                                                                   a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                                            </svg>
                                                                                    </button>
                                                                                </form>
                                                                            </span>
                                                                    @endcan
                                                                </div>
                                                                <div class="scc__meta d-none">
                                                                    <a href="#">
                                                                        <span><i class="icofont-lock"></i></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="scc__wrap">
                                                                <div class="scc__info">
                                                                    <i class="icofont-file-text"></i>
                                                                    <h5>В этом разделе пока нет лекций</h5>
                                                                </div>
                                                            </div>
                                                        @endforelse

                                                        @forelse($section->videos as $video)
                                                            <div class="scc__wrap">
                                                                <div
                                                                    class="scc__info d-flex justify-content-between align-items-center">
                                                                    <i class="icofont-video-alt"></i>

                                                                    @can('teacher')
                                                                        {{-- Преподаватель видит всё открыто --}}
                                                                        <a href="{{ route('course.video.show-lesson', $video->id) }}"
                                                                           target="_blank">
                                                                            <h5>{{ $video->title }}</h5>
                                                                        </a>
                                                                    @else
                                                                        {{-- Для студента проверяем доступ --}}
                                                                        @if($hasAccess)
                                                                            <a href="{{ route('course.video.show-lesson', $video->id) }}"
                                                                               target="_blank">
                                                                                <h5>{{ $video->title }}</h5>
                                                                            </a>
                                                                        @else
                                                                            <h5 class="text-muted"
                                                                                style="cursor: not-allowed;">
                                                                                {{ $video->title }}
                                                                            </h5>
                                                                            <i class="icofont-lock"></i>
                                                                        @endif
                                                                    @endcan

                                                                    @can('teacher')
                                                                        <span
                                                                            class="d-flex justify-content-center align-items-center ms-5 bg-top-span"
                                                                            style="width: 40px; height: 40px;">
                                                                                <a href="{{ route('course.video.edit-lesson', $video->id) }}"
                                                                                   class="text-primary"
                                                                                   title="Редактировать">
                                                                                    <svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16"
                                                                                        height="16" fill="currentColor"
                                                                                        class="bi bi-pencil"
                                                                                        viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                                        </svg>
                                                                                </a>
                                                                            </span>
                                                                        <span
                                                                            class="d-flex justify-content-center align-items-center bg-top-span"
                                                                            style="width: 40px; height: 40px;">
                                                                                <form
                                                                                    action="{{ route('course.video.delete-lesson', $video->id) }}"
                                                                                    method="POST"
                                                                                    onsubmit="return confirm('Вы уверены, что хотите удалить видеоурок?');">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                            class="btn p-0 border-0 bg-transparent text-danger"
                                                                                            title="Удалить">
                                                                                     <svg
                                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                                         width="16" height="16"
                                                                                         fill="currentColor"
                                                                                         class="bi bi-trash"
                                                                                         viewBox="0 0 16 16">
                                                                                          <path
                                                                                              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5
                                                                                               m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5
                                                                                               m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                                          <path
                                                                                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5
                                                                                               a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6
                                                                                               a1 1 0 0 1 1 1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4
                                                                                               L4 4.059V13a1 1 0 0 0 1 1h6
                                                                                               a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                                        </svg>
                                                                                    </button>
                                                                                </form>
                                                                            </span>
                                                                    @endcan
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="scc__wrap">
                                                                <div class="scc__info">
                                                                    <i class="icofont-video-alt"></i>
                                                                    <h5>В этом разделе пока нет видеоуроков</h5>
                                                                </div>
                                                            </div>
                                                        @endforelse


                                                        @forelse($section->tests as $test)
                                                            <div class="scc__wrap">
                                                                <div
                                                                    class="scc__info d-flex justify-content-between align-items-center">
                                                                    <i class="icofont-test-bulb"></i>

                                                                    @can('teacher')
                                                                        {{-- Преподаватель видит ссылку на прохождение/редактирование --}}
                                                                        <a href="{{route('course.test.show', $test->id)}}">
                                                                            <h5>{{ $test->title }}</h5>
                                                                        </a>
                                                                    @else
                                                                        {{-- Студент: только если есть доступ --}}
                                                                        @if($hasAccess)
                                                                            <a href="{{route('course.test.show', $test->id)}}">
                                                                                <h5>{{ $test->title }}</h5>
                                                                            </a>
                                                                        @else
                                                                            <h5 class="text-muted"
                                                                                style="cursor: not-allowed;">{{ $test->title }}</h5>
                                                                            <i class="icofont-lock"></i>
                                                                        @endif
                                                                    @endcan

                                                                    @can('teacher')
                                                                        <span
                                                                            class="d-flex justify-content-center align-items-center ms-5 bg-top-span"
                                                                            style="width: 40px; height: 40px;">
                                                                            {{-- Кнопка редактирования--}}
                                                                                    <a href="{{route('course.test.edit', $test->id)}}"
                                                                                       class="text-primary"
                                                                                       title="Редактировать">
                                                                                        <svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="16" height="16"
                                                                                            fill="currentColor"
                                                                                            class="bi bi-pencil"
                                                                                            viewBox="0 0 16 16">
                                                                                            <path
                                                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5
                                                                                                13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5
                                                                                                3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5
                                                                                                a.5.5 0 0 1 .5.5v.5h.293zm-9.761
                                                                                                5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5
                                                                                                0 0 1 5 12.5V12h-.5a.5.5 0 0
                                                                                                1-.5-.5V11h-.5a.5.5 0 0
                                                                                                1-.468-.325"/>
                                                                                        </svg>
                                                                                    </a>
                                                                                </span>
                                                                        <span
                                                                            class="d-flex justify-content-center align-items-center bg-top-span"
                                                                            style="width: 40px; height: 40px;">
                                                                            {{-- Кнопка удаления--}}
                                                                            <form
                                                                                action="{{route('course.test.delete',  $test->id)}}"
                                                                                method="POST"
                                                                                onsubmit="return confirm('Вы уверены, что хотите удалить тест?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                        class="btn p-0 border-0 bg-transparent text-danger"
                                                                                        title="Удалить">
                                                                                    <svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="16" height="16"
                                                                                        fill="currentColor"
                                                                                        class="bi bi-trash"
                                                                                        viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M5.5 5.5A.5.5 0 0
                                                                                            1 6 6v6a.5.5 0 0 1-1
                                                                                            0V6a.5.5 0 0 1 .5-.5m2.5
                                                                                            0a.5.5 0 0 1 .5.5v6a.5.5
                                                                                            0 0 1-1 0V6a.5.5 0 0 1
                                                                                            .5-.5m3 .5a.5.5 0 0 0-1
                                                                                            0v6a.5.5 0 0 0 1 0z"/>
                                                                                        <path
                                                                                            d="M14.5 3a1 1 0 0
                                                                                            1-1 1H13v9a2 2 0 0
                                                                                            1-2 2H5a2 2 0 0
                                                                                            1-2-2V4h-.5a1 1 0 0
                                                                                            1-1-1V2a1 1 0 0
                                                                                            1 1-1H6a1 1 0 0 1
                                                                                            1 1h2a1 1 0 0 1 1
                                                                                            1h3.5a1 1 0 0 1 1
                                                                                            1zM4.118 4 4 4.059V13a1
                                                                                            1 0 0 0 1 1h6a1 1 0 0
                                                                                            0 1-1V4.059L11.882
                                                                                            4zM2.5 3h11V2h-11z"/>
                                                                                    </svg>
                                                                                </button>
                                                                            </form>
                                                                        </span>
                                                                    @endcan
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="scc__wrap">
                                                                <div class="scc__info">
                                                                    <i class="icofont-test-bulb"></i>
                                                                    <h5>В этом разделе пока нет тестов</h5>
                                                                </div>
                                                            </div>
                                                        @endforelse

                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>Разделов пока нет.</p>
                                        @endforelse



                                    </div>
                                </div>

                                {{--  Описание курса   --}}
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

                {{--  Доп информация о курсе   --}}
                <div class="col-xl-3 col-lg-3">
                    <div class="course__details__sidebar">
                        <div class="event__sidebar__wraper" data-aos="fade-up">

                            <div class="course__summery__button">

                                <form action="{{ route('student.add-course') }}" method="post">
                                    @csrf
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">

                                                <button
                                                    class="create__course__bottom__button_top mb-2"
                                                    type="submit"
                                                    id="generate-code-btn"
                                                >
                                                    Поступить на курс
                                                </button>

                                                <div class="input-group  dashboard__form__input ">
                                                    <input
                                                        type="text"
                                                        name="course_code"
                                                        id="course-code"
                                                        class="form-control"
                                                        placeholder="Введите код курса"

                                                    />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="course__summery__lists">
                                <ul>
                                    <li>
                                        <div class="course__summery__item">
                                            <span class="sb_label">Инструктор:</span>
                                            <span
                                                class="sb_content">{{$courseInfo->teacher->first_name}} {{$courseInfo->teacher->last_name}}</span>
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
                                            <span class="sb_label">На курсе</span>
                                            <span class="sb_content">{{ $totalStudents }} студ.</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="course__summery__item">
                                            <span class="sb_label">Лек.</span>
                                            <span class="sb_content">{{ $totalLectures }}</span>
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
