@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>asset('images/logo-media.png'),'page'=>trans('pages.about_us'),'desc'=>$about->content,'updated_time'=>$about->updated_at,'published_time'=>$about->created_at])



@endsection
@push('css')
    <style>
        .img-banner {
            content: "";
            width: 100%;
            height: 100%;
            background-image: url('{{$about->primary_image}}');
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
    <section class="page-banner contact-us">
        <div class="img-banner">
{{--            <img src="{{$about->primary_image}}" alt="{{$about->translate('en')->slug}}">--}}
        </div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-lg">
                    @lang('pages.about_us')
                </h1>
            </div>
        </div>
    </section>

    <section class="business  section-padding" id="business">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-6 mt-auto mb-auto">
                    <h2 class=" text-white line-height-initial">
                        {{$about->title}}
                    </h2>
                </div>
                <div class="col-md-5 col-lg-5 mt-auto mb-auto">
                    <img class="img-large" src="{{asset('images/logo-media.png')}}"
                         alt="{{$about->translate('en')->slug}}">
                </div>


            </div>
            <div class="row">

                <div class="col-md-6 col-lg-6 mt-auto mb-auto">
                    <img src="{{asset('images/why-onset.png')}}"
                         alt="{{$about->translate('en')->slug}}">
                </div>

                <div class="col-md-6 col-lg-6 mt-auto mb-auto p-5">
                    <h2 class=" text-white line-height-initial">
                        {{$about->content}}
                    </h2>
                </div>

            </div>
        </div>
    </section>
@endsection
