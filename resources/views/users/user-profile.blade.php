@extends('users.layouts.user-app')


@section('title', 'Персональные данные | Znatok-KG ')

@section('content-user')

    <div class="col-xl-9 col-lg-9 col-md-12">
    <div class="dashboard__content__wraper">
        <div class="dashboard__section__title">
            <h4>Персональные данные</h4>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-6">
                <div class="dashboard__form fs-size-top " >Дата регистрации</div>
            </div>
            <div class="col-lg-8 col-md-8 col-6">
                <div class="dashboard__form fs-size-top">{{$user->created_at}}</div>
            </div>
            <div class="col-lg-4 col-md-4  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">Имя</div>
            </div>
            <div class="col-lg-8 col-md-8  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top ">{{$user->first_name}}</div>
            </div>
            <div class="col-lg-4 col-md-4  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">Фамилия</div>
            </div>
            <div class="col-lg-8 col-md-8  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">{{$user->last_name}}</div>
            </div>

            <div class="col-lg-4 col-md-4  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">Email</div>
            </div>
            <div class="col-lg-8 col-md-8  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">{{$user->email}}</div>
            </div>

            <div class="col-lg-4 col-md-4  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">Роль </div>
            </div>
            @if($user->role == 'student')
            <div class="col-lg-8 col-md-8  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">Ученик</div>
            </div>
            @else
                <div class="col-lg-8 col-md-8  col-6">
                    <div class="dashboard__form dashboard__form__margin fs-size-top">Учитель</div>
                </div>
            @endif

            <div class="col-lg-4 col-md-4  col-6">
                <div class="dashboard__form dashboard__form__margin fs-size-top">Биография</div>
            </div>
            @if($user->bio == null )
                <div class="col-lg-8 col-md-8  col-6">
                    <div class="dashboard__form dashboard__form__margin fs-size-top">Пока нет данных</div>
                </div>
            @else
                <div class="col-lg-8 col-md-8  col-6">
                    <div class="dashboard__form dashboard__form__margin fs-size-top">{{$user->bio}}</div>
                </div>
            @endif

        </div>
    </div>

</div>

@endsection
