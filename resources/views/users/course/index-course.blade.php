@extends('users.layouts.user-app')


@section('title', 'Мои курсы | Znatok-KG ')

@section('content-user')

    <div class="col-xl-9 col-lg-9 col-md-12">
        <div class="dashboard__content__wraper">
            <div class="dashboard__section__title">
                <h4>Статус курса</h4>
            </div>
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
                                                        <i class="icofont-book-alt"></i> 29 Lesson
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="gridarea__heading">
                                                <h3><a href="#">{{ $course->title }}</a></h3>
                                            </div>

                                            <div class="gridarea__bottom">
                                                <a href="instructor-details.html">
                                                    <div class="gridarea__small__img">

                                                        <div class="gridarea__small__content">
                                                            <h6>{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h6>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                Список опубликованных курсов пуст!
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
                                                        <i class="icofont-book-alt"></i> 29 Lesson
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="gridarea__heading">
                                                <h3><a href="#">{{ $course->title }}</a></h3>
                                            </div>

                                            <div class="gridarea__bottom">
                                                <a href="instructor-details.html">
                                                    <div class="gridarea__small__img">

                                                        <div class="gridarea__small__content">
                                                            <h6>{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h6>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                Список ожидаемых курсов пуст!
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
                                                        <i class="icofont-book-alt"></i> 29 Lesson
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="gridarea__heading">
                                                <h3><a href="#">{{ $course->title }}</a></h3>
                                            </div>

                                            <div class="gridarea__bottom">
                                                <a href="instructor-details.html">
                                                    <div class="gridarea__small__img">

                                                        <div class="gridarea__small__content">
                                                            <h6>{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h6>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                Список черновых курсов пуст!
                            @endforelse



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
