@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>$page->primary_image,
                              'page'=>trans('pages.services'),
                              'desc'=>$page->content,
                              'updated_time'=>$page->updated_at,
                              'published_time'=>$page->created_at])



@endsection
@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner" >
            <img src="{{$page->primary_image}}"   alt="services">
        </div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-lg">
                 @lang('pages.services')
                </h1>
            </div>
        </div>
    </section>

{{--    <section class="services-pages d-none d-sm-block section-padding">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($services as $service)--}}

{{--                    <div class="col-sm-6 mb-3 col-md-6">--}}
{{--                        <a href="{{route('taxonomy.show',$service->translate('en')->slug)}}"--}}
{{--                           class="text-black text-decoration-none">--}}
{{--                            <div class="content-services">--}}
{{--                                --}}{{--                            <i class="uil uil-video"></i>--}}
{{--                                <img src="{{$service->primary_image}}" alt="{{$service->translate('en')->title}}">--}}
{{--                                <h3 class="text-lg">{{$service->title}}</h3>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}


{{--                @endforeach--}}


{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="text-center">--}}
{{--            <a href="{{route('contact.page')}}" class="btn btn-primary btn-view">--}}
{{--                <b>--}}
{{--                    تواصل معنا--}}
{{--                </b>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--    </section>--}}
    <section class="business-services  d-none d-sm-block section-padding" id="business">
        <div class="container">

            <div class="row">
                @foreach($services as $project)
                    <div class="col-sm-6 mb-3">
                        <a href="{{route('taxonomy.show',$project->translate('en')->slug)}}"
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

    <section class="services-pages services-pages-mobile-section d-block d-sm-none  section-padding" id="services">
        <div class="container">

            <div class="swiper swiper-services">
                <div class="swiper-wrapper">
                    @foreach($services as $service)

                            <div class="swiper-slide">
                                <a href="{{route('taxonomy.show',$service->translate('en')->slug)}}"
                                   class="text-black text-decoration-none">
                                <div class="services-pages-mobile-section">
                                    {{--                            <i class="uil uil-video"></i>--}}
                                    <img src="{{$service->primary_image}}" alt="{{$service->translate('en')->title}}">
                                    <p>{{$service->title}}</p>
                                </div>
                                </a>
                            </div>

                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="text-center">
                <a href="{{route('contact.page')}}" class="btn btn-primary btn-view">
                    <b>
                        تواصل معنا
                    </b>
                </a>
            </div>

        </div>
    </section>
@endsection
