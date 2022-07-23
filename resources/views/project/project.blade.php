@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>$obj->primary_image,
                              'page'=>$obj->title,
                              'desc'=>$obj->title,
                              'updated_time'=>$obj->updated_at,
                              'published_time'=>$obj->created_at])
@endsection
@section('content')
    <section class="page-banner contact-us pb-5">
        <div class="img-banner">
            <img src="{{$obj->primary_image}}" alt="{{$obj->title}}">
        </div>
        <div class="container">
            <div class="page-title">
                <h1>
                    {{$obj->title}}
                </h1>

            </div>
            @include('partials.request-order')
            <br/>

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


                    @if (isset($obj->images)&&count($obj->images)>0)
                        @if ($link->translate('en')->slug == 'behance')
                            <a href="{{isset($obj->images)&&$obj->images>0?$link->links[0]:''}}">
                                <i class="text-white text-lg uil uil-behance"></i>
                            </a>

                        @endif
                    @elseif(isset($obj->links)&&count($obj->links)>0)
                        @if ($link->translate('en')->slug == 'youtube')
                            <a href="{{isset($obj->images)&&$obj->images>0?$link->links[0]:''}}">
                                <i class="text-white text-lg uil uil-youtube"></i>
                            </a>
                        @endif
                    @endif

                @endforeach


            </div>
        </div>

    </section>
@endsection
