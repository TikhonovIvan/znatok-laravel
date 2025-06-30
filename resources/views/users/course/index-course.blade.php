@extends('users.layouts.user-app')


@section('title', 'Мои курсы | Znatok-KG ')

@section('content-user')

    <div class="col-xl-9 col-lg-9 col-md-12">
        <div class="dashboard__content__wraper">
            <div class="dashboard__section__title">
                @can('teacher')
                    <h4>Статус курса</h4>
                @endcan
                @can('student')
                    <h4>Мои курсы</h4>
                    <form action="{{ route('student.add-course') }}" method="post">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="dashboard__form__wraper">
                                <div class="dashboard__form__input">
                                    <label for="course-code">Добавить курс</label>
                                    <div class="input-group  dashboard__form__input">
                                        <input
                                            type="text"
                                            name="course_code"
                                            id="course-code"
                                            class="form-control"
                                            placeholder="Введите код курса"

                                        />
                                        <button
                                            class="create__course__bottom__button_top"
                                            type="submit"
                                            id="generate-code-btn"
                                        >
                                            Добавить курс
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endcan
            </div>


            @can('teacher')
                <div class="row">
                    <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">

                        <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link active" data-bs-toggle="tab"
                                        data-bs-target="#projects__one" type="button" aria-selected="true"
                                        role="tab">Публиковать
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link" data-bs-toggle="tab"
                                        data-bs-target="#projects__two" type="button" aria-selected="false"
                                        role="tab" tabindex="-1">В ожидании
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link" data-bs-toggle="tab"
                                        data-bs-target="#projects__three" type="button" aria-selected="false"
                                        role="tab" tabindex="-1">Черновик
                                </button>
                            </li>
                        </ul>


                    </div>
                    <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent"
                         data-aos="fade-up">

                        <div class="tab-pane fade active show" id="projects__one" role="tabpanel"
                             aria-labelledby="projects__one">
                            <div class="row">

                                @forelse($publishedCourses as $course)

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="gridarea__wraper">
                                            <div class="gridarea__img">
                                                <img
                                                    loading="lazy"
                                                    src="{{ $course->cover ? asset('uploads/' . $course->cover) : asset('img/default.png') }}"
                                                    style="height: 250px; object-fit: cover; width: 100%;"
                                                >
                                                <div class="gridarea__small__button">
                                                    <div class="grid__badge blue__color">{{ $course->category }}</div>
                                                </div>


                                            </div>
                                            <div class="gridarea__content">
                                                <div class="gridarea__list">
                                                    <ul>
                                                        <li>
                                                            <i class="icofont-book-alt"></i>
                                                            {{ $course->sections->flatMap->lectures->count() }} лек.
                                                        </li>


                                                    </ul>
                                                </div>
                                                <div class="gridarea__heading">
                                                    <h3>
                                                        <a href="{{route('course.details-course', $course->id)}}">{{ $course->title }}</a>
                                                    </h3>
                                                </div>

                                                <div class="gridarea__bottom">

                                                        <div class="gridarea__small__img flex-wrap">

                                                            <div class="gridarea__small__content ">
                                                                <h6>
                                                                    Автор: {{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h6>
                                                                <form action="{{route('teacher.delete-course',$course->id )}}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить курс');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="create__course__bottom__button_top mt-2"
                                                                        type="submit"
                                                                    >
                                                                        Удалить курс
                                                                    </button>
                                                                </form>

                                                            </div>

                                                        </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    @can('teacher')
                                        <div class="fs-6">Список опубликованных <br> курсов пуст!</div>
                                    @endcan

                                @endforelse


                            </div>
                        </div>

                        <div class="tab-pane fade" id="projects__two" role="tabpanel"
                             aria-labelledby="projects__two">

                            <div class="row">


                                @forelse($pendingCourses as $course)

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="gridarea__wraper">
                                            <div class="gridarea__img">
                                                <img
                                                    loading="lazy"
                                                    src="{{ $course->cover ? asset('uploads/' . $course->cover) : asset('img/default.png') }}"
                                                    style="height: 250px; object-fit: cover; width: 100%;"
                                                >
                                                <div class="gridarea__small__button">
                                                    <div class="grid__badge blue__color">{{ $course->category }}</div>
                                                </div>


                                            </div>
                                            <div class="gridarea__content">
                                                <div class="gridarea__list">
                                                    <ul>
                                                        <li>
                                                            <i class="icofont-book-alt"></i>
                                                            {{ $course->sections->flatMap->lectures->count() }} лек.
                                                        </li>


                                                    </ul>
                                                </div>
                                                <div class="gridarea__heading">
                                                    <h3>
                                                        <a href="{{route('course.details-course', $course->id)}}">{{ $course->title }}</a>
                                                    </h3>
                                                </div>

                                                <div class="gridarea__bottom">

                                                        <div class="gridarea__small__img flex-wrap">

                                                            <div class="gridarea__small__content">
                                                                <h6>
                                                                    Автор: {{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h6>
                                                                <form action="{{route('teacher.delete-course', $course->id)}}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить курс');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="create__course__bottom__button_top mt-2"
                                                                        type="submit"
                                                                    >
                                                                        Удалить курс
                                                                    </button>
                                                                </form>
                                                            </div>

                                                        </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="fs-6">Список опубликованных <br> курсов пуст!</div>
                                @endforelse


                            </div>

                        </div>

                        <div class="tab-pane fade" id="projects__three" role="tabpanel"
                             aria-labelledby="projects__three">
                            <div class="row">

                                @forelse($draftCourses as $course)

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="gridarea__wraper">
                                            <div class="gridarea__img">
                                                <img
                                                    loading="lazy"
                                                    src="{{ $course->cover ? asset('uploads/' . $course->cover) : asset('img/default.png') }}"
                                                    style="height: 250px; object-fit: cover; width: 100%;"
                                                >
                                                <div class="gridarea__small__button">
                                                    <div class="grid__badge blue__color">{{ $course->category }}</div>
                                                </div>


                                            </div>
                                            <div class="gridarea__content">
                                                <div class="gridarea__list">
                                                    <ul>
                                                        <li>
                                                            <i class="icofont-book-alt"></i>
                                                            {{ $course->sections->flatMap->lectures->count() }} лек.
                                                        </li>


                                                    </ul>
                                                </div>
                                                <div class="gridarea__heading">
                                                    <h3>
                                                        <a href="{{route('course.details-course', $course->id)}}">{{ $course->title }}</a>
                                                    </h3>
                                                </div>

                                                <div class="gridarea__bottom">

                                                        <div class="gridarea__small__img ">

                                                            <div class="gridarea__small__content">
                                                                <h6>
                                                                    Автор: {{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h6>
                                                                <form action="{{route('teacher.delete-course', $course->id)}}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить курс');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="create__course__bottom__button_top mt-2"
                                                                        type="submit"
                                                                    >
                                                                        Удалить курс
                                                                    </button>
                                                                </form>

                                                            </div>

                                                        </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="fs-6">Список опубликованных <br> курсов пуст!</div>
                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>

            @endcan

            @can('student')
                <div class="row">
                    @forelse($addedCourses as $course)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="gridarea__wraper">
                                <div class="gridarea__img">
                                    <img
                                        loading="lazy"
                                        src="{{ $course->cover ? asset('uploads/' . $course->cover) : asset('img/default.png') }}"
                                        style="height: 250px; object-fit: cover; width: 100%;"
                                    >
                                    <div class="gridarea__small__button">
                                        <div class="grid__badge blue__color">{{ $course->category }}</div>
                                    </div>
                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i>
                                                {{ $course->sections->flatMap->lectures->count() }} лек.
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3>
                                            <a href="{{ route('course.details-course', $course->id) }}">{{ $course->title }}</a>
                                        </h3>
                                    </div>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__small__content ">
                                            <h6>
                                                Автор: {{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h6>

                                            <form action="{{ route('student.leave-course', $course->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите покинуть этот курс?');">
                                                @csrf
                                                <button
                                                    class="create__course__bottom__button_top mt-2"
                                                    type="submit"
                                                >
                                                    Покинуть курс
                                                </button>
                                            </form>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        Вы пока не добавили ни одного курса.
                    @endforelse
                </div>
            @endcan
        </div>


    </div>

@endsection
