@extends('layouts.app')


@section('title', 'Создание теста | Znatok-KG ')

@section('content')


    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Создать тест</h2>
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
            <form action="{{route('course.test.store', $courseId )}}" method="post">
                @csrf
                <input type="hidden" name="course_id" value="{{ $courseId }}">

                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <h2 class="">Создать тест</h2>
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
                                                                <label for="#">Название теста</label>
                                                                <input
                                                                    name="title"
                                                                    value="{{old('title')}}"
                                                                    type="text"
                                                                    placeholder="Введите название теста"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label for="#">Информация о тесте</label>
                                                                <textarea
                                                                    name="description"
                                                                    id=""
                                                                    cols="30"
                                                                    rows="10"
                                                                >{{old('description')}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-4">
                                                        <div
                                                            class="dashboard__select__heading dashboard__form__input"
                                                        >
                                                            <label for="#">Укажите раздел</label>
                                                        </div>
                                                        <div class="dashboard__selector">
                                                            <select class="form-select" aria-label="Default select example" name="section_id" required>
                                                                <option selected disabled>Выберите раздел</option>
                                                                @foreach($sections as $section)
                                                                    <option value="{{ $section->id }}">{{ $section->title }}</option>
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

                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                                <div class="create__course__bottom__button">
                                    <button type="submit" class="create__course__bottom__button_top">Создать тест</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>

        </div>
    </div>


@endsection
