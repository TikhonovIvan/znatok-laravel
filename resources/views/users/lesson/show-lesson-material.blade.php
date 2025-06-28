@extends('layouts.app')


@section('title', 'Лекция | Znatok-KG ')

@section('content')

    <!-- breadcrumbarea__section__start -->
    <div class="breadcrumbarea" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper">
                        <div class="breadcrumb__title">
                            <h2 class="heading">{{$lesson->title}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="{{asset('assets/img/herobanner/herobanner__1.png')}}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="{{asset('assets/img/herobanner/herobanner__2.png')}}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="{{asset('assets/img/herobanner/herobanner__3.png')}}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="{{asset('assets/img/herobanner/herobanner__5.png')}}" alt="photo">
        </div>

    </div>
    <!-- breadcrumbarea__section__end-->


    <!-- Содержимое лекции__start -->
    <div class="tution sp_bottom_100 sp_top_100">
        <div class="container-fluid full__width__padding">

            <div class="row">

                <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <div class="lesson__meterials__wrap">
                        <div class="aboutarea__content__wraper__5">
                            <div class="section__title">
                                <!-- <div class="section__title__button">
                                    <div class="default__small__button">About us</div>
                                </div> -->
                                <div class="section__title__heading ">
                                    <h2>{{$lesson->title}}</h2>
                                </div>
                            </div>
                            <div class="about__text__5">
                                <p>Meet my startup design agency Shape Rex Currently I am working at CodeNext as Product Designer. Lorem ipsum dolor sit amet consectetur adipisicing elit. A, quaerat excepturi accusantium eum, dolorem ipsa deleniti dicta voluptates reiciendis tempore aliquid assumenda at labore, unde quibusdam! Tenetur hic enim odit.
                                    <br>
                                    <br>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. In illum facilis quaerat expedita. Inventore, commodi. Non molestias neque esse ipsam temporibus quia accusantium voluptas facilis enim blanditiis, doloribus, facere omnis.
                                </p>
                            </div>

                            <div class="container">
                                {!!  $lesson->contetn!!}

                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Содержимое лекции__end -->
@endsection
