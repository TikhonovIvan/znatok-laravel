<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aos.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (
            localStorage.getItem("theme-color") === "dark" ||
            (!("theme-color" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            document.documentElement.classList.add("is_dark");
        }
        if (localStorage.getItem("theme-color") === "light") {
            document.documentElement.classList.remove("is_dark");
        }
    </script>
</head>

<body class="body__wrapper">

<!-- превюшка start -->
<div id="back__preloader">
    <div id="back__circle_loader"></div>
    <div class="back__loader_logo">
        <img loading="lazy"  src="{{asset('assets/img/pre.png')}}"  alt="Preload" style="width: 80px;">
    </div>
</div>
<!-- превюшка end -->

<!-- Светлая и темная тема переключатель -->
<div class="mode_switcher my_switcher">
    <button id="light--to-dark-button" class="light align-items-center">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="ionicon dark__mode"
            viewBox="0 0 512 512"
        >
            <path
                d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="32"
            />
        </svg>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="ionicon light__mode"
            viewBox="0 0 512 512"
        >
            <path
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-miterlimit="10"
                stroke-width="32"
                d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"
            />
            <circle
                cx="256"
                cy="256"
                r="80"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-miterlimit="10"
                stroke-width="32"
            />
        </svg>

        <span class="light__mode">Светлая</span>
        <span class="dark__mode">Темная</span>
    </button>
</div>
<!-- Светлая и темная тема переключатель -->

<main class="main_wrapper overflow-hidden">

    @include('layouts.header')

    <!-- dashboardarea__area__start  -->
    <div class="dashboardarea sp_bottom_100">
        <div class="container-fluid full__width__padding">
            <div class="row">

                <div class="col-xl-12">
                    <div class="dashboardarea__wraper">
                        <div class="dashboardarea__img">
                            <div class="dashboardarea__inner admin__dashboard__inner">
                                <div class="dashboardarea__left">
                                    <div class="dashboardarea__left__img d-none">
                                        <img loading="lazy"  src="../img/dashbord/dashbord__2.jpg" alt="">
                                    </div>
                                    <div class="dashboardarea__left__content">
                                        <h5>Добро пожаловать</h5>
                                        <h4>{{ auth()->user()->last_name }} {{ auth()->user()->first_name }}</h4>
                                    </div>
                                </div>

                                @can('teacher')


                                <div class="dashboardarea__right">
                                    <div class="dashboardarea__right__button">
                                        <a class="default__button" href="create-course.html">Создать новый курс
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg></a>
                                    </div>
                                </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="dashboard">
            <div class="container-fluid full__width__padding">
                <div class="row">
                 @include('users.layouts.user-header')



                    @yield('content-user')


                </div>
            </div>
        </div>
    </div>
    <!-- dashboardarea__menu__end   -->


   @include('layouts.footer')


