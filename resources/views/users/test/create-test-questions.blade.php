@extends('layouts.app')


@section('title', 'Создание вопросов к тесту | Znatok-KG ')

@section('content')

    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Создание вопросов к тесту</h2>
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
    <!-- breadcrumbarea__section__end-->

    <!-- become__instructor__start -->
    <form
        action="{{ route('course.test.questions.store', $course) }}"
        method="post"
    >
        @csrf

        <div class="create__course sp_100">
            <div class="container">
                <div class="row">
                    <!-- список тестов -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-4">
                        <div class="dashboard__select__heading dashboard__form__input">
                            <label for="#">Укажите тест</label>
                        </div>
                        <div class="dashboard__selector">
                            <select
                                class="form-select"
                                name="test_id"
                                required
                            >
                                <option selected disabled>Выберите тест</option>
                                @foreach($tests as $test)
                                    <option value="{{ $test->id }}">{{ $test->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                            <div class="accordion" id="questions-container">
                                <!-- Блок первого вопроса -->
                                <div class="accordion-item question-block" id="question-block-1">
                                    <h2 class="accordion-header">
                                        <h2>Вопрос 1</h2>
                                    </h2>
                                    <div class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="become__instructor__form">
                                                <div class="row">

                                                    <!-- Вопрос -->
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>Текст вопроса</label>
                                                                <input
                                                                    type="text"
                                                                    name="questions[0][text]"
                                                                    class="question-input"
                                                                    placeholder="Введите текст вопроса"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Варианты -->
                                                    @for($i=0; $i<4; $i++)
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                            <div class="dashboard__form__wraper">
                                                                <div class="dashboard__form__input answer-option">
                                                                    <label>Вариант ответа {{ $i+1 }}</label>
                                                                    <div class="d-flex align-items-center">
                                                                        <input
                                                                            type="text"
                                                                            name="questions[0][answers][{{ $i }}][text]"
                                                                            class="answer-input"
                                                                            placeholder="Введите вариант ответа"
                                                                        />
                                                                        <label class="checkbox-container ms-3 pb-4">
                                                                            <input
                                                                                type="checkbox"
                                                                                name="questions[0][answers][{{ $i }}][is_correct]"
                                                                                value="1"
                                                                                class="correct-answer"
                                                                            />
                                                                            <span class="checkmark"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- последующие вопросы будут добавляться через JS -->
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                                <div class="create__course__bottom__button d-flex gap-2">
                                    <a id="add-question-btn" style="color: #fff !important">
                                        Добавить вопрос
                                    </a>
                                    <button
                                        type="submit"
                                        class="text-white"
                                    >
                                        Сохранить все вопросы
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <style>
        .create__course__bottom__button button {
            background: var(--primaryColor);
            color: var(--whiteColor);
            display: inline-block;
            text-align: center;
            padding: 13px;
            width: 100%;
            border-radius: 6px;
            border: none;
        }

        .create__course__bottom__button button:hover {
            background: var(--secondaryColor);
            color: var(--whiteColor);
        }

        /* Стили для кастомных чекбоксов */
        .checkbox-container {
            display: inline-block;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border: 1px solid #ccc;
        }

        .checkbox-container:hover input ~ .checkmark {
            background-color: #ddd;
        }

        .checkbox-container input:checked ~ .checkmark {
            background-color: #2196f3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .checkbox-container input:checked ~ .checkmark:after {
            display: block;
        }

        .checkbox-container .checkmark:after {
            left: 7px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let questionCount = 1;

            // Функция для создания нового блока вопроса
            function createNewQuestionBlock() {
                questionCount++;
                const newQuestionId = `question-block-${questionCount}`;

                let answerInputsHtml = '';
                for (let i = 0; i < 4; i++) {
                    answerInputsHtml += `
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="dashboard__form__wraper">
                <div class="dashboard__form__input answer-option">
                    <label>Вариант ответа ${i + 1}</label>
                    <div class="d-flex align-items-center">
                        <input type="text" name="questions[${questionCount - 1}][answers][${i}][text]" placeholder="Введите вариант ответа" class="answer-input">
                        <label class="checkbox-container ms-3 pb-4">
                            <input type="checkbox" name="questions[${questionCount - 1}][answers][${i}][is_correct]" value="1" class="correct-answer">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        `;
                }

                const newQuestionBlock = document.createElement("div");
                newQuestionBlock.className = "accordion-item question-block";
                newQuestionBlock.id = newQuestionId;

                newQuestionBlock.innerHTML = `
    <h2 class="accordion-header">
        <h2>Вопрос ${questionCount}</h2>
        <div class="create__course__bottom__button">
            <button type="button" class="delete-question-btn text-white" style="width: 200px; margin-left: 30px" data-question-id="${newQuestionId}">Удалить вопрос</button>
        </div>
    </h2>
    <div class="accordion-collapse collapse show">
        <div class="accordion-body">
            <div class="become__instructor__form">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="dashboard__form__wraper">
                            <div class="dashboard__form__input">
                                <label>Текст вопроса</label>
                                <input type="text" name="questions[${questionCount - 1}][text]" placeholder="Введите текст вопроса" class="question-input">
                            </div>
                        </div>
                    </div>
                    ${answerInputsHtml}
                </div>
            </div>
        </div>
    </div>`;

                return newQuestionBlock;
            }


            // Обработчик кнопки "Добавить вопрос"
            document
                .getElementById("add-question-btn")
                .addEventListener("click", function () {
                    const newQuestionBlock = createNewQuestionBlock();
                    document
                        .getElementById("questions-container")
                        .appendChild(newQuestionBlock);
                });

            // Обработчик удаления вопроса (делегирование событий)
            document.addEventListener("click", function (e) {
                if (e.target.classList.contains("delete-question-btn")) {
                    const questionId = e.target.getAttribute("data-question-id");
                    const questionBlock = document.getElementById(questionId);
                    if (questionBlock) {
                        questionBlock.remove();
                        // Обновляем нумерацию вопросов
                        updateQuestionNumbers();
                    }
                }
            });

            // Функция для обновления нумерации вопросов
            function updateQuestionNumbers() {
                const questionBlocks = document.querySelectorAll(".question-block");
                questionCount = 0;

                questionBlocks.forEach((block, index) => {
                    questionCount++;
                    const questionId = `question-block-${questionCount}`;
                    block.id = questionId;

                    const header = block.querySelector(".accordion-header h2");
                    header.textContent = `Вопрос ${questionCount}`;

                    const deleteBtn = block.querySelector(".delete-question-btn");
                    if (deleteBtn) {
                        deleteBtn.setAttribute("data-question-id", questionId);
                    }
                });
            }

            // Обработчик кнопки "Сохранить все вопросы"
            document
                .getElementById("save-questions-btn")
                .addEventListener("click", function () {
                    const questionBlocks =
                        document.querySelectorAll(".question-block");
                    if (questionBlocks.length === 0) {
                        alert("Пожалуйста, добавьте хотя бы один вопрос");
                        return;
                    }

                    const questionsData = [];
                    let hasErrors = false;

                    questionBlocks.forEach((block, index) => {
                        const questionText =
                            block.querySelector(".question-input").value;
                        const answerInputs = block.querySelectorAll(".answer-input");
                        const correctCheckboxes =
                            block.querySelectorAll(".correct-answer");

                        if (!questionText) {
                            alert(`Пожалуйста, введите текст вопроса ${index + 1}`);
                            hasErrors = true;
                            return;
                        }

                        let hasCorrectAnswer = false;
                        const answers = [];

                        answerInputs.forEach((input, ansIndex) => {
                            const answerText = input.value;
                            const isCorrect = correctCheckboxes[ansIndex].checked;

                            if (isCorrect) hasCorrectAnswer = true;

                            answers.push({
                                text: answerText || `Вариант ${ansIndex + 1}`,
                                isCorrect: isCorrect,
                            });
                        });

                        if (!hasCorrectAnswer) {
                            alert(
                                `Пожалуйста, укажите хотя бы один правильный ответ для вопроса ${
                                    index + 1
                                }`
                            );
                            hasErrors = true;
                            return;
                        }

                        questionsData.push({
                            questionText: questionText,
                            answers: answers,
                        });
                    });

                    if (!hasErrors) {
                        console.log("Все вопросы сохранены:", questionsData);
                        alert(`Успешно сохранено ${questionsData.length} вопросов!`);
                        // Здесь можно добавить код для отправки данных на сервер
                    }
                });
        });
    </script>
    <!-- become__instructor__end -->

@endsection
