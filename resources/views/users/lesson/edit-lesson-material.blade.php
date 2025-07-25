@extends('layouts.app')


@section('title', 'Редактирование лекции | Znatok-KG ')

@section('content')

    <div class="create__course sp_100">
        <div class="container">

            <form action="{{route('course.lesson.update', $lesson )}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header mt-2" id="headingOne">
                                        Редактировать лекционный материал
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
                                                                <label for="#">Название лекции</label>
                                                                <input
                                                                    type="text"
                                                                    name="title"
                                                                    value="{{old('title',  $lesson->title)}}"
                                                                    placeholder="Введите название лекции"
                                                                />
                                                            </div>
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
                                                                        {{ old('section_id', $lesson->section_id) == $section->id ? 'selected' : '' }}
                                                                    >
                                                                        {{ $section->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label for="#">Содержимое лекции </label>
                                                            <textarea
                                                                name="content"
                                                                id=""
                                                                cols="30"
                                                                rows="10"
                                                                class="ckeditor"
                                                            >   {{old('content',  $lesson->content)}}</textarea>
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
                                    <button  class="create__course__bottom__button_top" type="submit" style="width: 250px">Редактировать лекцию</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof CKEDITOR !== "undefined") {
                document.querySelectorAll(".ckeditor").forEach(function (el) {
                    CKEDITOR.replace(el);
                });
            } else {
                console.error("CKEditor не загружен.");
            }
        });
    </script>
@endsection
