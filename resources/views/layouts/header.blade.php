<!-- Шапка_контактов_и_сети__stert -->
<div class="topbararea">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="topbar__left">
                    <ul>
                        <li>Контакты: +996 500 123 123 - -</li>
                        <li>Email: Itcroc@mail.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="topbar__right">
                    <div class="topbar__icon">
                        <i class="icofont-location-pin"></i>
                    </div>
                    <div class="topbar__text">
                        <p>Адрес: Бишкек ул.Фрунзе 243</p>
                    </div>
                    <div class="topbar__list">
                        <ul>
                            <li>
                                <a href="#"><i class="icofont-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-youtube-play"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Шапка_контактов_и_сети__end -->


<!-- Шапка сайта start -->
<header>
    <div class="headerarea headerarea__2 header__sticky header__area">
        <div class="container desktop__menu__wrapper ">
            <div class="row ">
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">

                            <a href="{{route('home')}}" class="fs-4 fs-lg-2 " style="font-weight: 900;">

                                <span style="color: #f2277e;">Znatok</span><span style="color: #5f2ded;">-KG</span></a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 main_menu_wrap ">
                    <div class="headerarea__main__menu">
                        <nav>
                            <ul>
                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="{{route('home')}}"
                                    >Главная
                                    </a>
                                </li>

                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="{{route('about')}}"
                                    >О нас
                                    </a>
                                </li>

                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="course.html"
                                    >Курсы
                                    </a>
                                </li>

                                <li class="mega__menu position-static d-none">
                                    <a class="headerarea__has__dropdown" href="blog.html">Блог </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="headerarea__right">

                        @auth
                        <div class="headerarea__login  ">
                            @if(auth()->user()->role == 'student')
                            <span class="me-3">Статус: Ученик </span>
                            @else
                                <span class="me-3 ">Статус: Учитель</span>
                            @endif
                            <span class="me-3">{{ auth()->user()->last_name }} {{ auth()->user()->first_name }} </span>
                            <a href="{{route('profile')}}"><i class="icofont-user-alt-5"></i></a>
                        </div>
                        @else
                        <div class="headerarea__button">
                            <a href="{{route('login')}}">Начать обучение</a>
                        </div>
                        @endauth
                    </div>
                </div>

            </div>

        </div>


        <div class="container-fluid mob_menu_wrapper">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo">
                        <a href="{{route('home')}}" class="fs-4" style="font-weight: 900;">
                            <span style="color: #f2277e;">Znatok</span> <span style="color: #5f2ded;">- KG </span></a>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="header-right-wrap">


                        <div class="mobile-off-canvas">
                            <a class="mobile-aside-button" href="#"><i class="icofont-navigation-menu"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Шапка сайта end -->

<!-- Mobile Menu Start Here -->
<div class="mobile-off-canvas-active">
    <a class="mobile-aside-close"><i class="icofont  icofont-close-line"></i></a>
    <div class="header-mobile-aside-wrap">
        <div class="mobile-search">
            <form class="search-form" action="#">
                <input type="text" placeholder="Найти курс или статью">
                <button class="button-search"><i class="icofont icofont-search-2"></i></button>
            </form>
        </div>
        <div class="mobile-menu-wrap headerarea">

            <div class="mobile-navigation">

                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="{{route('home')}}">Главная</a></li>
                        <li class="menu-item-has-children "><a href="{{route('about')}}">О нас</a></li>
                        <li class="menu-item-has-children "><a href="blog.html">Блог</a></li>
                        <li class="menu-item-has-children "><a href="course.html">Курсы</a></li>

                    </ul>
                </nav>

            </div>

        </div>
        <div class="mobile-curr-lang-wrap">

            <div class="single-mobile-curr-lang">
                <a class="mobile-account-active" href="#">Аккаунт <i class="icofont-thin-down"></i></a>
                <div class="lang-curr-dropdown account-dropdown-active">
                    <ul>
                        <li><a href="{{route('login')}}">Вход</a></li>
                        <br>
                        <li><a href="{{route('login')}}">Регистрация</a></li>
                        <br>
                        <li><a href="login.html">Кабинет</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-social-wrap">
            <a class="facebook" href="#"><i class="icofont icofont-facebook"></i></a>
            <a class="twitter" href="#"><i class="icofont icofont-twitter"></i></a>
            <a class="pinterest" href="#"><i class="icofont icofont-pinterest"></i></a>
            <a class="instagram" href="#"><i class="icofont icofont-instagram"></i></a>
            <a class="google" href="#"><i class="icofont icofont-youtube-play"></i></a>
        </div>
    </div>
</div>
<!-- Mobile Menu end Here -->



<!-- Зафиксировать тему -->
<div>
    <div class="theme__shadow__circle"></div>
    <div class="theme__shadow__circle shadow__right"></div>
</div>
<!-- Зафиксировать тему -->


<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-6 text-center">

            @if ($errors->any())
                <div class="alert alert-dismissible show" style="background: #5f2ded; color: #fff" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-dismissible show" style="background: #5f2ded; color: #fff" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-dismissible show" style="background: #dc3545; color: #fff" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
    </div>
</div>


{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function() {--}}
{{--        const alertElement = document.querySelector('.alert');--}}
{{--        if (alertElement) {--}}
{{--            setTimeout(() => {--}}
{{--                alertElement.classList.add('fade'); // плавное исчезновение--}}
{{--                alertElement.classList.remove('show');--}}
{{--                // полностью убрать из DOM через ещё 0.5 сек, когда анимация закончится--}}
{{--                setTimeout(() => {--}}
{{--                    alertElement.remove();--}}
{{--                }, 500);--}}
{{--            }, 4000);--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
