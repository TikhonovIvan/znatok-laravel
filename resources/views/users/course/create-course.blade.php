@extends('layouts.app')

@section('title', 'Создать курс | Znatok-KG ')

@section('content')

    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Создание курса</h2>
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
            <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <span class="mt-5">Информация о курсе</span>
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
                                                                <label for="#">Название курса</label>
                                                                <input
                                                                    type="text"
                                                                    name="title"
                                                                    placeholder="Course Title"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label for="#">Обложка курса</label>
                                                                <input name="cover" type="file" accept="image/*"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div
                                                            class="col-xl-6 col-lg-6 col-md-6 col-12 mb-4"
                                                        >
                                                            <div
                                                                class="dashboard__select__heading dashboard__form__input"
                                                            >
                                                                <label for="#">Категорий курса</label>
                                                            </div>
                                                            <div class="dashboard__selector">
                                                                <select
                                                                    name="category"
                                                                    class="form-select"
                                                                    aria-label="Default select example"
                                                                >
                                                                    <option selected disabled>Выберите категорию</option>
                                                                    <option value="Веб дизайн">Веб дизайн</option>
                                                                    <option value="Компьютерная графика">Компьютерная графика</option>
                                                                    <option value="Программирование">Программирование</option>
                                                                    <option value="Английский">Английский</option>
                                                                    <option value="Наука">Наука</option>
                                                                    <option value="Медицина">Медицина</option>
                                                                    <option value="Робототехника">Робототехника</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label for="#">Информация о курсе</label>
                                                                <textarea
                                                                    name="short_description"
                                                                    id=""
                                                                    cols="30"
                                                                    rows="10"
                                                                ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="mb-4">
                                                            <div
                                                                class="dashboard__select__heading dashboard__form__input mb-2"
                                                            >
                                                                <label for="#">Статус курса</label>
                                                            </div>
                                                            <div class="d-flex gap-5 flex-wrap">
                                                                <label
                                                                    class="dashboard__form__input d-flex align-items-center gap-2"
                                                                >
                                                                    <input
                                                                        type="radio"
                                                                        name="status"
                                                                        value="draft"
                                                                        checked
                                                                    />
                                                                    <label>Черновик</label>
                                                                </label>
                                                                <label
                                                                    class="dashboard__form__input d-flex align-items-center gap-2"
                                                                >
                                                                    <input
                                                                        type="radio"
                                                                        name="status"
                                                                        value="pending"
                                                                        style="width: auto !important"
                                                                    />
                                                                    <label>В ожидании</label>
                                                                </label>
                                                                <label
                                                                    class="dashboard__form__input d-flex align-items-center gap-2"
                                                                >
                                                                    <input
                                                                        type="radio"
                                                                        name="status"
                                                                        value="publish"
                                                                    />
                                                                    <label>Публикация</label>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label for="course-code">Код курса</label>
                                                                <div class="input-group mb-3 dashboard__form__input">
                                                                    <input
                                                                        type="text"
                                                                        name="course_code"
                                                                        id="course-code"
                                                                        class="form-control"
                                                                        placeholder="Нажмите 'Сгенерировать код'"
                                                                        readonly
                                                                    />
                                                                    <button
                                                                        class="create__course__bottom__button_top"
                                                                        type="button"
                                                                        id="generate-code-btn"
                                                                    >
                                                                        Сгенерировать код
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        document.addEventListener(
                                                            "DOMContentLoaded",
                                                            function () {
                                                                // Функция генерации случайного символа (буква или цифра)
                                                                function getRandomChar() {
                                                                    const chars =
                                                                        "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                                                                    return chars.charAt(
                                                                        Math.floor(Math.random() * chars.length)
                                                                    );
                                                                }

                                                                // Функция генерации части кода (4 символа)
                                                                function generateCodePart() {
                                                                    let part = "";
                                                                    for (let i = 0; i < 4; i++) {
                                                                        part += getRandomChar();
                                                                    }
                                                                    return part;
                                                                }

                                                                // Функция генерации полного кода курса
                                                                function generateCourseCode() {
                                                                    return `${generateCodePart()}-${generateCodePart()}-${generateCodePart()}`;
                                                                }

                                                                // Обработчик клика по кнопке
                                                                document
                                                                    .getElementById("generate-code-btn")
                                                                    .addEventListener("click", function () {
                                                                        const codeInput =
                                                                            document.getElementById("course-code");
                                                                        codeInput.value = generateCourseCode();

                                                                        // Можно добавить выделение текста для удобства копирования
                                                                        codeInput.select();
                                                                    });
                                                            }
                                                        );
                                                    </script>
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
                                    <button class="create__course__bottom__button_top"  type="submit" >Создать курс</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                        <div class="create__course__wraper">
                            <div class="create__course__title">
                                <h4>Пометка для создания курса</h4>
                            </div>
                            <div class="create__course__list">
                                <ul>
                                    <li>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-check"
                                        >
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Укажите названи вашего курса.
                                    </li>

                                    <li>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-check"
                                        >
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Курс должен предоставлять <br/>решение или базовые
                                        знания.
                                    </li>
                                    <li>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-check"
                                        >
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Выберите категорию курса.
                                    </li>
                                    <li>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-check"
                                        >
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Добавьте описание курса.
                                    </li>
                                    <li>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-check"
                                        >
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
