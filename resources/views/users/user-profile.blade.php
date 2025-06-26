@extends('users.layouts.user-app')


@section('title', 'Персональные данные | Znatok-KG ')

@section('content-user')

    <div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4>Персональные данные</h4>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form">Дата регистрации</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form">{{$user->created_at}}</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Имя</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">{{$user->first_name}}</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Фамилия</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">{{$user->last_name}}</div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Email</div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="dashboard__form dashboard__form__margin">{{$user->email}}</div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="dashboard__form dashboard__form__margin">Биография</div>
            </div>
            @if($user->bio == null )
                <div class="col-lg-8 col-md-8">
                    <div class="dashboard__form dashboard__form__margin">Пока нет данных</div>
                </div>
            @else
                <div class="col-lg-8 col-md-8">
                    <div class="dashboard__form dashboard__form__margin">{{$user->bio}}</div>
                </div>
            @endif

        </div>
    </div>

</div>

@endsection
