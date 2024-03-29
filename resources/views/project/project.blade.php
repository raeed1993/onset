@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>$obj->primary_image,
                              'page'=>$obj->title,
                              'desc'=>$obj->title,
                              'updated_time'=>$obj->updated_at,
                              'published_time'=>$obj->created_at])
@endsection
@push('css')
    <style>
        .img-banner {
            content: "";
            width: 100%;
            height: 100%;
            background-image: url('{{$obj->primary_image}}');
            background-position: bottom;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.8;
            z-index: -1;
        }
    </style>
@endpush
@section('content')
    <section class="page-banner contact-us pb-5">
        <div class="img-banner">
{{--            <img src="{{$obj->primary_image}}" alt="{{$obj->title}}">--}}
        </div>


        <h1 class="text-center">
            {{$obj->title}}
        </h1>


        @include('partials.request-order')
        <br/>


    </section>
    <section class="business  d-none d-sm-block section-padding" id="business">
        <div class="container">
            @if (isset($obj->image_link))
                <div class="row">
                    @foreach($obj->image_link as $image)

                        <div class="col-sm-6 col-md-3 mb-3">
                            @if (isset($image->link))
                                <a target="_blank" href="{{$image->link}}" class="text-decoration-none">
                                    <div class="content-business">
                                        <div class="image-normal-show ">
                                            <img src="{{$image->image}}"  alt="{{$obj->title}}">
                                        </div>

                                    </div>
                                </a>
                            @else
                                <div class="content-business">
                                    <div class="image-normal-show ">
                                        <img src="{{$image->image}}"  alt="{{$obj->title}}">
                                    </div>

                                </div>
                            @endif

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
                                    width="100%"
                                    height="148"
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
                @lang('home.see_more')

            </h3>

            <div class="text-center icon-show-more">
                @foreach($links as $link)


                    @if (isset($obj->image_link)&&count($obj->image_link)>0)
                        @if ($link->translate('en')->slug == 'behance')
                            <a href="{{isset($obj->image_link)&&$obj->image_link>0?$link->links[0]:''}}">
                                <i class="text-white text-lg uil uil-behance"></i>
                            </a>

                        @endif
                    @elseif(isset($obj->links)&&count($obj->links)>0)
                        @if ($link->translate('en')->slug == 'youtube')
                            <a href="{{isset($obj->image_link)&&$obj->image_link>0?$link->links[0]:''}}">
                                <i class="text-white text-lg uil uil-youtube"></i>
                            </a>
                        @endif
                    @endif

                @endforeach


            </div>
        </div>

    </section>

    <section class="business  d-block d-sm-none section-padding" id="business">
        <div class="container">
            @if (isset($obj->image_link))
                <div class="row">
                    @foreach($obj->image_link as $image)

                        <div class="col-sm-6 col-md-3 mb-3">
                            @if (isset($image->link))
                                <a target="_blank" href="{{$image->link}}" class="text-decoration-none">
                                    <div class="content-business">
                                        <div class="image-normal-show-mobile">
                                            <img src="{{$image->image}}"  alt="{{$obj->title}}">
                                        </div>

                                    </div>
                                </a>
                            @else
                                <div class="content-business">
                                    <div class="image-normal-show-mobile ">
                                        <img src="{{$image->image}}"  alt="{{$obj->title}}">
                                    </div>

                                </div>
                            @endif

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
                                    width="100%"
                                    height="148"
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
                @lang('home.see_more')

            </h3>

            <div class="text-center icon-show-more">
                @foreach($links as $link)


                    @if (isset($obj->image_link)&&count($obj->image_link)>0)
                        @if ($link->translate('en')->slug == 'behance')
                            <a href="{{isset($obj->image_link)&&$obj->image_link>0?$link->links[0]:''}}">
                                <i class="text-white text-lg uil uil-behance"></i>
                            </a>

                        @endif
                    @elseif(isset($obj->links)&&count($obj->links)>0)
                        @if ($link->translate('en')->slug == 'youtube')
                            <a href="{{isset($obj->image_link)&&$obj->image_link>0?$link->links[0]:''}}">
                                <i class="text-white text-lg uil uil-youtube"></i>
                            </a>
                        @endif
                    @endif

                @endforeach


            </div>
        </div>

    </section>
@endsection
