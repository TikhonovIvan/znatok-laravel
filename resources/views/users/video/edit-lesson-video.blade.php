@extends('layouts.app')


@section('title', 'Редактирование видео материал | Znatok-KG ')

@section('content')

    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Обновить видео материал</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img
                loading="lazy"
                class="shape__icon__img shape__icon__img__1"
                src="{{asset('assets/img/herobanner/herobanner__1.png')}}"
                alt="photo"
            />
            <img
                loading="lazy"
                class="shape__icon__img shape__icon__img__2"
                src="{{asset('assets/img/herobanner/herobanner__2.png')}}"
                alt="photo"
            />
            <img
                loading="lazy"
                class="shape__icon__img shape__icon__img__3"
                src="{{asset('assets/img/herobanner/herobanner__3.png')}}"
                alt="photo"
            />
            <img
                loading="lazy"
                class="shape__icon__img shape__icon__img__4"
                src="{{asset('assets/img/herobanner/herobanner__5.png')}}"
                alt="photo"
            />
        </div>
    </div>

    <div class="create__course sp_100">
        <div class="container">
            <form action="{{route('course.video.update-lesson', $video)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        Обновить видео материала
                                    </h2>
                                    <div
                                        id="collapseOne"
                                        class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample"
                                    >
                                        <div class="accordion-body">
                                            <div class="become__instructor__form">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label for="#">Название видео</label>
                                                                <input
                                                                    name="title"
                                                                    type="text"
                                                                    value="{{old('title',$video->title )}}"
                                                                    placeholder="Название видео урока"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label for="#">URL видео</label>
                                                                <input
                                                                    name="url"
                                                                    type="text"
                                                                    value="{{old('url', $video->url)}}"
                                                                    placeholder="Пример https://www.youtube.com/"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-4">
                                                            <div
                                                                class="dashboard__select__heading dashboard__form__input"
                                                            >
                                                                <label for="#">Укажите раздел</label>
                                                            </div>
                                                            <div class="dashboard__selector">
                                                                <select class="form-select" name="section_id" required>
                                                                    <option disabled>Выберите раздел</option>
                                                                    @foreach($sections as $section)
                                                                        <option
                                                                            value="{{ $section->id }}"
                                                                            {{ old('section_id', $video->section_id) == $section->id ? 'selected' : '' }}
                                                                        >
                                                                            {{ $section->title }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                                <div class="create__course__bottom__button">
                                    <button  type="submit" class="create__course__bottom__button_top"  >Обновить видео </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
