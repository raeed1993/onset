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
    <section class="article section-padding" id="article">
        <div class="container">

            <div class="row">

                @foreach($blogs as $blog)

                    <section class="col-md-6 col-lg-4 mb-4">
                        <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}" class="text-decoration-none">
                        <div class="article-content text-white">
                            <div class="article-content_img">
                                <img src="{{$blog->primary_image}}" alt="{{$blog->title}}"/>
                            </div>
                            <h4>{{$blog->title}}</h4>
{{--                            <div class="text-white">--}}
                                {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
{{--                            </div>--}}
                            @include('partials.continue-read')
                        </div>
                        </a>
                    </section>

                @endforeach

            </div>
        </div>
    </section>
@endsection
