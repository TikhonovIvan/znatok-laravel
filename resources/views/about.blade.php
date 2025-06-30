@extends('layouts.app')


@section('title', 'О Нас | Znatok-KG ')

@section('content')


    <!-- aboutarea__5__section__start -->
    <div class="aboutarea__5 sp_bottom_100 sp_top_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6" data-aos="fade-up">
                    <div class="aboutarea__5__img" data-tilt>
                        <img loading="lazy"  src="{{asset('assets/img/about/about_14.png')}}" alt="about">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6" data-aos="fade-up">
                    <div class="aboutarea__content__wraper__5">
                        <div class="section__title">
                            <div class="section__title__button">
                                <div class="default__small__button">О нас</div>
                            </div>
                            <div class="section__title__heading ">
                                <h2>Добро пожаловать в онлайн-центр обучения</h2>
                            </div>
                        </div>
                        <div class="about__text__5">
                            <p>Познакомьтесь с моим стартапом — дизайн-агентством Shape Rex. В настоящее время я работаю в CodeNext дизайнером продукта.</p>
                        </div>

                        <div class="aboutarea__5__small__icon__wraper">
                            <div class="aboutarea__5__small__icon">
                                <img loading="lazy"  src="{{asset('assets/img/about/about_15.png')}}" alt="about">

                            </div>
                            <div class="aboutarea__small__heading">
                                    <span>
                                    10+ лет опыта</span> В этой игре это означает проектирование продукта
                            </div>

                        </div>




                        <div class="aboutarea__para__5">
                            <p>Я люблю работать в сфере проектирования пользовательского опыта и пользовательского интерфейса. Потому что я люблю решать проблемы дизайна и находить простые и лучшие решения для их решения. Я всегда стараюсь сделать хороший пользовательский интерфейс с лучшим пользовательским опытом. Я работаю UX-дизайнером</p>
                        </div>

                        <div class="aboutarea__bottom__button__5">
                            <a class="default__button" href="#"> Подробнее о проекте
                                <i class="icofont-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- aboutarea__5__section__end -->

    <!-- about__tap__section__start -->
    <div class="abouttabarea sp_bottom_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12" data-aos="fade-up">
                    <ul class="nav  about__button__wrap" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button">О нас</button>
                        </li>

                        <li class="nav-item d-none" role="presentation">
                            <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__three" type="button">Награды</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__four" type="button">образование</button>
                        </li>


                    </ul>
                </div>



                <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">

                    <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                        <div class="col-xl-12">
                            <div class="aboutarea__content__tap__wraper">
                                <p class="paragraph__1">Наша миссия — создать современную и доступную образовательную веб-платформу, которая объединяет обучение, проверку знаний и цифровую безопасность в едином пространстве.</p>
                                <div class="aboutarea__tap__heading">
                                    <h5>Что мы предлагаем:</h5>
                                    <p>Интерактивное обучение<br>
                                        Удобный доступ к учебным материалам, видеоурокам и презентациям. Все материалы доступны в любое время и с любого устройства.
                                        <br><br>
                                        Система тестирования знаний
                                        Интегрированная система тестов и заданий позволяет отслеживать прогресс, проводить проверку знаний и формировать индивидуальные образовательные траектории.
                                        <br><br>
                                        Ролевой доступ и гибкое управление
                                        Три уровня доступа: ученик, учитель, администратор. Каждый пользователь получает инструменты, соответствующие его задачам и ответственности.
                                        <br><br>
                                        Методы защиты данных
                                        Мы уделяем особое внимание безопасности: реализованы шифрование персональных данных, защита от несанкционированного доступа, двухфакторная аутентификация и безопасное хранение информации.
                                        <br><br>
                                        Современный дизайн и удобный интерфейс
                                        Продуманный пользовательский интерфейс и адаптивный дизайн делают обучение удобным и эффективным как на компьютерах, так и на мобильных устройствах.

                                    </p>
                                </div>

                                <div class="aboutarea__tap__heading">

                                    <p>Мы уверены, что образование должно быть не только доступным, но и безопасным. Именно поэтому наша команда разработчиков, дизайнеров и педагогов объединяет усилия для создания качественной и технологичной платформы нового поколения.</p>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="projects__three d-none" role="tabpanel" aria-labelledby="projects__three">
                        <div class="col-xl-12">
                            <div class="aboutarea__content__tap__wraper">

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="single__event__wraper single__award" data-aos="fade-up">
                                            <div class="eventarea__img">
                                                <img loading="lazy"  src="{{asset('assets/img/about/award-1.jpg')}}" alt="event">
                                            </div>
                                            <div class="eventarea__content__wraper">
                                                <div class="single__event__heading">
                                                    <h4><a href="event-details.html">Forging relationships between national</a></h4>
                                                </div>
                                                <div class="single__event__button">
                                                    <a href="event-details.html">Read More <i class="icofont-simple-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="single__event__wraper single__award" data-aos="fade-up">
                                            <div class="eventarea__img">
                                                <img loading="lazy"  src="img/about/award-2.jpg" alt="event">
                                            </div>
                                            <div class="eventarea__content__wraper">
                                                <div class="single__event__heading">
                                                    <h4><a href="event-details.html">Lorem ipsum dolor sit amet conse ctetur.</a></h4>
                                                </div>
                                                <div class="single__event__button">
                                                    <a href="event-details.html">Read More <i class="icofont-simple-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="single__event__wraper single__award" data-aos="fade-up">
                                            <div class="eventarea__img">
                                                <img loading="lazy"  src="img/about/award-3.jpg" alt="event">
                                            </div>
                                            <div class="eventarea__content__wraper">
                                                <div class="single__event__heading">
                                                    <h4><a href="event-details.html">Forging relationships between national</a></h4>
                                                </div>
                                                <div class="single__event__button">
                                                    <a href="event-details.html">Read More <i class="icofont-simple-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="single__event__wraper single__award" data-aos="fade-up">
                                            <div class="eventarea__img">
                                                <img loading="lazy"  src="img/about/award-4.jpg" alt="event">
                                            </div>
                                            <div class="eventarea__content__wraper">
                                                <div class="single__event__heading">
                                                    <h4><a href="event-details.html">Lorem ipsum dolor sit amet conse ctetur.</a></h4>
                                                </div>
                                                <div class="single__event__button">
                                                    <a href="event-details.html">Read More <i class="icofont-simple-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="projects__four" role="tabpanel" aria-labelledby="projects__four">
                        <div class="col-xl-12">
                            <div class="aboutarea__content__tap__wraper">
                                <div class="aboutarea__tap__heading">
                                    <h5>World’s Best Education Site – Computer Engineering</h5>
                                    <p>
                                        Мы предлагаем передовые образовательные материалы и интерактивные курсы по направлению "Компьютерная инженерия". От основ алгоритмов до системного программирования — всё, что нужно для уверенного старта и успешного развития в IT.

                                        Примеры курсов:<br>
                                        • Архитектура компьютеров<br>
                                        • Сетевые технологии<br>
                                        • Языки программирования (C++, Python, Java)<br>
                                        • Операционные системы и базы данных

                                    </p>
                                </div>

                                <div class="aboutarea__tap__heading">
                                    <h5> Interaction Design – Animation</h5>
                                    <p>
                                        Создавай современные веб-интерфейсы с нуля. Мы обучаем не только фронтенд-разработке, но и UX-дизайну, а также работе с инструментами проектирования.

                                        Вы изучите:<br>
                                        • HTML, CSS, JavaScript <br>
                                        • Адаптивный дизайн и кроссбраузерность<br>
                                        • Прототипирование и UI-киты<br>
                                        • Работа с Figma и Tailwind

                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- .about__tap__section__end -->



@endsection
