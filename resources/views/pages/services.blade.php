@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>$page->primary_image,
                              'page'=>trans('pages.services'),
                              'desc'=>$page->content,
                              'updated_time'=>$page->updated_at,
                              'published_time'=>$page->created_at])



@endsection
@push('css')
    <style>
        .img-banner {
            content: "";
            width: 100%;
            height: 100%;
            background-image: url('{{$page->primary_image}}');
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.3;
            z-index: -1;
        }
    </style>
@endpush
@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner" >
{{--            <img src="{{$page->primary_image}}"   alt="services">--}}
        </div>
        <div class="container">
            <div class="page-title">
                <h1 class="  text-center">
                 @lang('pages.services')
                </h1>
            </div>
        </div>
    </section>

    <section class="business-services  d-none d-sm-block section-padding" id="business">
        <div class="container">

            <div class="row">
                @foreach($services as $project)
                    <div class="col-sm-6 mb-3">
                        <a href="{{route(app()->getLocale()=='en'?app()->getLocale().'.taxonomy.show':'taxonomy.show',$project->translate('en')->slug)}}"
                           class="text-decoration-none">
                            <div class="content-business">
                                <div class="content-business_img">
                                    <img src="{{$project->primary_image}}" alt="{{$project->translate('en')->title}}"/>
                                    <h2>{{$project->title}}</h2>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>

{{--    <section class="services-pages services-pages-mobile-section d-block d-sm-none  section-padding" id="services">--}}
{{--        <div class="container">--}}

{{--            <div class="swiper swiper-services">--}}
{{--                <div class="swiper-wrapper">--}}
{{--                    @foreach($services as $service)--}}

{{--                            <div class="swiper-slide">--}}
{{--                                <a href="{{route('taxonomy.show',$service->translate('en')->slug)}}"--}}
{{--                                   class="text-black text-decoration-none">--}}
{{--                                <div class="services-pages-mobile-section">--}}
{{--                                    --}}{{--                            <i class="uil uil-video"></i>--}}
{{--                                    <img src="{{$service->primary_image}}" alt="{{$service->translate('en')->title}}">--}}
{{--                                    <p>{{$service->title}}</p>--}}
{{--                                </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <a href="{{route('contact.page')}}" class="btn btn-primary btn-view">--}}
{{--                    <b>--}}
{{--                       @lang('pages.contact_us')--}}
{{--                    </b>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}
    <section class="business-services business-mobile-section d-block d-sm-none section-padding" id="business">
        <div class="container">

            <div class="swiper business-mobile">
                <div class="swiper-wrapper">
                    @foreach($services as $project)
                        <div class="swiper-slide">
                            <a href="{{route(app()->getLocale()=='en'?app()->getLocale().'.taxonomy.show':'taxonomy.show',$project->translate('en')->slug)}}"
                               class="text-decoration-none">
                                <div class="content-business">
                                    <div class="content-business_img">
                                        <img src="{{$project->primary_image}}" alt="{{$project->translate('en')->title}}"/>
                                        <h2>{{$project->title}}</h2>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
@endsection
