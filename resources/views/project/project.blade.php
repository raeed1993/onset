@extends('layouts.app')

@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner">
            <img src="{{$obj->primary_image}}" alt="">
        </div>
        <div class="container">
            <div class="page-title">
                <h4>
                    {{$obj->title}}
                </h4>
            </div>
            @include('partials.request-order')
        </div>
    </section>
    <section class="business section-padding" id="business">
        <div class="container">
            @if (isset($obj->images))
                <div class="row">
                    @foreach($obj->images as $image)

                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="content-business">
                                <div class="image-normal-show ">
                                    <img src="{{$image}}" alt="{{$obj->title}}">
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (isset($obj->links))
                <div class="row">
                    @foreach($obj->links as $link)

                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="video-normal-show">
                                <iframe

                                    src="{{$link}}"
                                    title="{{$obj->title}}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>


                        </div>
                    @endforeach
                </div>
            @endif

            <h3 class="text-center text-white">
                مشاهدة المزيد من الأعمال

            </h3>

            <div class="text-center icon-show-more">

                        <a href="#">
                            @if (isset($obj->images)&&$obj->images>0)
                                <i class="text-white text-lg uil uil-behance"></i>
                            @elseif(isset($obj->links)&&$obj->links>0)
                                <i class="text-white text-lg uil uil-youtube"></i>
                            @endif

                        </a>

            </div>
        </div>

    </section>
@endsection
