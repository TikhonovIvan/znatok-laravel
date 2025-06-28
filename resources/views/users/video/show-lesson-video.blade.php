@extends('layouts.app')


@section('title', 'Видео урок | Znatok-KG ')

@section('content')

    <div class="tution sp_bottom_100 sp_top_50">
        <div class="container-fluid full__width__padding">
            <div class="row">


                <div
                    class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12"
                    data-aos="fade-up"
                >
                    <div class="lesson__content__main">
                        <div class="lesson__content__wrap">
                            <h3>{{$video->title}}</h3>

                        </div>


                        <div class="plyr__video-embed rbtplayer" >


                            <iframe
                                src="{{ $embedUrl }}"
                                allowfullscreen
                                allow="autoplay"
                            ></iframe>

                            <style>
                                .plyr__video-embed {
                                    position: relative;
                                    padding-bottom: 56.25%; /* Соотношение сторон 16:9 */
                                    height: 0;
                                    overflow: hidden;
                                }

                                .plyr__video-embed iframe {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    border: none;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
