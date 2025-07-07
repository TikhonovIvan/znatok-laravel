

@extends('layouts.app')


@section('title', '404 | Znatok-KG ')

@section('content')

<div class="errorarea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-sm-12 col-12 m-auto">
                <div class="errorarea__inner" data-aos="fade-up">
                    <div class="error__img">
                        <img loading="lazy"  src="{{ asset('assets/img/error.png') }}" alt="error">
                    </div>
                    <div class="error__text">
                        <h3>Упс... Кажется, вы заблудились!</h3>
                        <p>Упс! Страница, которую вы ищете, не существует. Возможно, она была перемещена или удалена</p>
                    </div>
                    <div class="error__button">
                        <a class="default__button" href="{{ route('home') }}">Перейти на главную
                            <i class="icofont-simple-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
