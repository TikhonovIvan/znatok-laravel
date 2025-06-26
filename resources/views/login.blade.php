@extends('layouts.app')

@section('title', 'Вход в систему | Znatok-KG ')

@section('content')


<!-- login__section__start -->
<div class="loginarea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-8 offset-md-2" data-aos="fade-up">
                <ul class="nav  tab__button__wrap text-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button">Вход</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button">Регистрация</button>
                    </li>
                </ul>
            </div>


            <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">

                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 col-md-8 offset-md-2">
                        <div class="loginarea__wraper">
                            <div class="login__heading">
                                <h5 class="login__title">Вход</h5>
                                <p class="login__description">У вас еще нет учетной записи?  <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Зарегистрируйтесь</a></p>
                            </div>



                            <form method="post" action="{{route('auth.login')}}">
                                @csrf
                                <div class="login__form">
                                    <label class="form__label">Имя пользователя или адрес электронной почты</label>
                                    <input class="common__login__input" type="email" name="email" placeholder="Введите email" required>

                                </div>
                                <div class="login__form">
                                    <label class="form__label">Пароль</label>
                                    <input class="common__login__input" type="password" name="password" placeholder="Введите пароль" required>

                                </div>
                                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input id="forgot" type="checkbox" required>
                                        <label for="forgot"> Запомнить меня</label>
                                    </div>
                                    <div class="text-end login__form__link">
                                        <a href="#">Забыл пароль?</a>
                                    </div>
                                </div>
                                <div class="login__button">
                                    <button class="default__button" style="width: 100%">Войти в систему</button>
                                </div>
                            </form>

                            <div class="login__social__option d-none">
                                <p>or Log-in with</p>

                                <ul class="login__social__btn">
                                    <li><a class="default__button login__button__1" href="#"><i class="icofont-facebook"></i> Gacebook</a></li>
                                    <li><a class="default__button" href="#"><i class="icofont-google-plus"></i> Google</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                    <div class="col-xl-8 offset-md-2">
                        <div class="loginarea__wraper">
                            <div class="login__heading">
                                <h5 class="login__title">Регистрация</h5>
                                <p class="login__description">У вас уже есть аккаунт?  <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Войти</a></p>
                            </div>



                            <form method="post" action="{{route('register')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Имя</label>
                                            <input class="common__login__input" type="text" name="first_name" placeholder="Имя">

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Фамилия</label>
                                            <input class="common__login__input" type="text" name="last_name" placeholder="Фамилия">

                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Роль</label>
                                            <select class="common__login__input custom-select " name="role">
                                                <option value="" disabled selected>Выберите роль</option>
                                                <option value="teacher">Учитель</option>
                                                <option value="student">Ученик</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Email</label>
                                            <input class="common__login__input" type="email" name="email" placeholder="Email">

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="login__form">
                                            <label class="form__label">Пароль</label>
                                            <input class="common__login__input" type="password" name="password" placeholder="Пароль">

                                        </div>
                                    </div>

                                </div>

                                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input id="accept_pp" type="checkbox"> <label for="accept_pp">Принять Условия и Политику конфиденциальности</label>
                                    </div>

                                </div>
                                <div class="login__button ">
                                    <button class="default__button" style="width: 100%">Пройти регистрацию </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" login__shape__img educationarea__shape_image">
            <img loading="lazy"  class="hero__shape hero__shape__1" src="{{asset('assets/img/education/hero_shape2.png')}}" alt="Shape">
            <img loading="lazy"  class="hero__shape hero__shape__2" src="{{asset('assets/img/education/hero_shape3.png')}}" alt="Shape">
            <img loading="lazy"  class="hero__shape hero__shape__3" src="{{asset('assets/img/education/hero_shape4.png')}}" alt="Shape">
            <img loading="lazy"  class="hero__shape hero__shape__4" src="{{asset('assets/img/education/hero_shape5.png')}}" alt="Shape">
        </div>


    </div>
</div>

<!-- login__section__end -->

@endsection
