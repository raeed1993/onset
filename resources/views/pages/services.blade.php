@extends('layouts.app')

@section('content')
    <section class="page-banner contact-us">
        <div class="container">
            <div class="page-title">
                <p class="text-lg">
                    خدماتنا
                </p>
            </div>
        </div>
    </section>

    <section class="services-pages d-none d-sm-block section-padding">
        <div class="container">
            <div class="row">
                @foreach($services as $service)

                    <div class="col-sm-6 mb-3 col-md-6">
                        <a href="{{route('taxonomy.show',$service->translate('en')->slug)}}"
                           class="text-black text-decoration-none">
                            <div class="content-services">
                                {{--                            <i class="uil uil-video"></i>--}}
                                <img src="{{$service->primary_image}}" alt="{{$service->translate('en')->title}}">
                                <h3 class="text-lg">{{$service->title}}</h3>
                            </div>
                        </a>
                    </div>


                @endforeach


            </div>
        </div>
        @include('partials.request-order')

    </section>
    <section class="services-pages services-pages-mobile-section d-block d-sm-none  section-padding" id="services">
        <div class="container">

            <div class="swiper swiper-services">
                <div class="swiper-wrapper">
                    @foreach($services as $service)
                        <div class="swiper-slide">
                            <div class="services-pages-mobile-section">
                                {{--                            <i class="uil uil-video"></i>--}}
                                <img src="{{$service->primary_image}}" alt="{{$service->translate('en')->title}}"
                                     height="100" width="100">
                                <p>{{$service->title}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="text-center">
                <a href="" class="btn btn-primary btn-view">طلب عرض</a>
            </div>
        </div>
    </section>
@endsection