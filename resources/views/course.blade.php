
@extends('layouts.app')


@section('title', 'Курсы | Znatok-KG ')

@section('content')


    <div class="breadcrumbarea">

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Все курсы</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="{{asset('assets/img/herobanner/herobanner__1.png')}}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="{{asset('assets/img/herobanner/herobanner__2.png')}}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="{{asset('assets/img/herobanner/herobanner__3.png')}}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="{{asset('assets/img/herobanner/herobanner__5.png')}}" alt="photo">
        </div>

    </div>
    <!-- breadcrumbarea__section__end-->

    <!-- course__section__start -->
    <div class="coursearea sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">

                <!-- левая панель -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                    <div class="course__sidebar__wraper" data-aos="fade-up">
                        <div class="course__heading">
                            <h5>Найти курс</h5>
                        </div>
                        <form action="{{ route('courses') }}" method="get">
                            <div class="course__input">
                                <input type="text" name="title" placeholder="Найти"
                                       value="{{ $filters['title'] ?? '' }}">
                                <div class="search__button">
                                    <button type="submit"><i class="icofont-search-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="course__sidebar__wraper" data-aos="fade-up">
                        <div class="categori__wraper">
                            <div class="course__heading">
                                <h5>Категории</h5>
                            </div>
                            <div class="course__categories__list">
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('courses', ['category' => $category]) }}">
                                                {{ $category }}
                                                <span>
                                                {{ \App\Models\Course::where('category', $category)->count() }}
                                            </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- правая часть -->
                <div class="col-xl-9 col-lg-9 col-md-8 col-12">

                    <div class="tab-content tab__content__wrapper with__sidebar__content" id="myTabContent">

                        <div class="tab-pane fade show active" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                            <div class="row">
                                @forelse($courses as $course)
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 col-12 mb-2" data-aos="fade-up">
                                        <div class="gridarea__wraper gridarea__wraper__2 card-container">
                                            <div class="gridarea__img">
                                                <img loading="lazy" src="{{ asset('uploads/' . $course->cover) }}" alt="{{ $course->title }}">
                                                <div class="gridarea__small__button">
                                                    <div class="grid__badge blue__color">{{ $course->category }}</div>
                                                </div>
                                            </div>
                                            <div class="gridarea__content card-content">
                                                <div class="gridarea__list">
                                                    <ul class="d-flex flex-wrap">
                                                        <li><i class="icofont-book-alt"></i> {{ $course->lessons_count ?? 0 }} ур.</li>

                                                    </ul>
                                                </div>
                                                <div class="gridarea__heading">
                                                    <h3><a href="{{ route('course.details-course', $course->id) }}">{{ $course->title }}</a></h3>
                                                </div>
                                                <div class="gridarea__bottom card-footer">
                                                    <a href="#">
                                                        <div class="gridarea__small__img">
                                                            <div class="gridarea__small__content">
                                                                <h6>{{ $course->author->first_name }}{{ $course->author->last_name }}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center">Курсы не найдены.</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- второй таб -->
                        <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                            <!-- можешь при необходимости вставить другой шаблон списка -->
                            <p>Другой вид отображения курсов пока не реализован.</p>
                        </div>
                    </div>

                    <div class="main__pagination__wrapper" data-aos="fade-up">
                        {{ $courses->links('vendor.pagination.custom') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- course__section__end -->



@endsection
