@extends('layouts.app')

@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner" >
            <img src="{{$image}}"  alt="portfolio">
        </div>
        <div class="container">
            <div class="page-title">
                <h1>
                   @lang('pages.portfolio')
                </h1>
            </div>
        </div>
    </section>

    <section class="business d-none d-sm-block section-padding" id="business">
        <div class="container">

            <div class="row">
                @foreach($projects as $project)
                    <div class="col-sm-6 mb-3">
                        <a href="{{route('taxonomy.show',$project->translate('en')->slug)}}"
                           class="text-decoration-none">
                            <div class="content-business">
                                <div class="content-business_img">
                                    <img src="{{$project->primary_image}}" alt="{{$project->translate('en')->title}}"/>
                                </div>
                                <h2>{{$project->title}}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>

    <section class="business business-mobile-section d-block d-sm-none section-padding" id="business">
        <div class="container">

            <div class="swiper business-mobile">
                <div class="swiper-wrapper">
                    @foreach($projects as $project)
                        <div class="swiper-slide">
                            <a href="{{route('taxonomy.show',$project->translate('en')->slug)}}"
                               class="text-decoration-none">
                                <div class="content-business">
                                    <div class="content-business_img">
                                        <img src="{{$project->primary_image}}" alt="{{$project->translate('en')->title}}"/>
                                    </div>
                                    <h2>{{$project->title}}</h2>
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
