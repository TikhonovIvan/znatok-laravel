@extends('layouts.app')

@section('title', 'Создать раздел курса | Znatok-KG ')

@section('content')

    <div class="create__course sp_100">
        <div class="container">
            <form action="{{route('course.update-chapter',$chapter->id )}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="course_id" value="{{ $chapter->course_id }}">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                            <div class="accordion" id="accordionExample">


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        Редактировать раздел
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                         aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="become__instructor__form">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label for="#">Название раздела</label>
                                                                <input type="text" name="title"
                                                                       value="{{old('title', $chapter->title)}}"
                                                                       placeholder="Раздел 1: Введение в дизайн">
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
                                    <button class="create__course__bottom__button_top" type="submit">Редактировать
                                        раздел
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-4 col-md-12 col-12 d-none">
                        <div class="create__course__wraper">
                            <div class="create__course__title">
                                <h4>Пометка для задание курса</h4>
                            </div>
                            <div class="create__course__list">
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Укажите название вашего курса.
                                    </li>

                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Курс должен предоставлять <br>решение или базовые знания.
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Выберите категорию курса.
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Добавьте описание курса.
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Выберите статус курса.
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
