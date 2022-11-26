@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>$page->primary_image,
                              'page'=>trans('pages.blog'),
                              'desc'=>$page->content,
                              'updated_time'=>$page->updated_at,
                              'published_time'=>$page->created_at])



@endsection
@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner" >
            <img src="{{$page->primary_image}}"  alt="blogs">
        </div>
        <div class="container">
            <div class="page-title">
                <h1>
                    @lang('pages.blog')
                </h1>
            </div>
        </div>
    </section>
    <section class="article d-none d-sm-block  section-padding" id="article">
        <div class="container">

            <div class="row">

                @foreach($blogs as $blog)

                    <section class="col-md-6 col-lg-4 mb-4">
                        <a href="{{route(app()->getLocale()=='en'?app()->getLocale().'.taxonomy.show':'taxonomy.show',$blog->translate('en')->slug)}}" class="text-decoration-none">
                        <div class="article-content text-white">
                            <div class="article-content_img">
                                <img src="{{$blog->primary_image}}" alt="{{$blog->title}}"/>
                            </div>
                            <h4>{{$blog->title}}</h4>
{{--                            <div class="text-white">--}}
                            <section>
                                {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
{{--                            </div>--}}
                            </section>
                                @include('partials.continue-read')


                        </div>
                        </a>
                    </section>

                @endforeach

            </div>
        </div>
    </section>
    <section class="business business-mobile-section d-block d-sm-none section-padding" id="business">
        <div class="container">

            <div class="swiper business-mobile">
                <div class="swiper-wrapper">
                    @foreach($blogs as $blog)
                        <section class="swiper-slide">
                            <a href="{{route(app()->getLocale()=='en'?app()->getLocale().'.taxonomy.show':'taxonomy.show',$blog->translate('en')->slug)}}"
                               class="text-decoration-none">
                                <div class="content-business">
                                    <div class="content-business_img">
                                        <img src="{{$blog->primary_image}}" alt="{{$blog->translate('en')->title}}"/>
                                    </div>
                                    <h2>{{$blog->title}}</h2>
                                    <section>
                                    {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
                                    </section>
                                        @include('partials.continue-read')

                                </div>
                            </a>
                        </section>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
@endsection
