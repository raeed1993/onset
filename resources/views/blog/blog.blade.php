@extends('layouts.app')

@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner">
            <img src="{{$obj->primary_image}}" alt="{{$obj->title}}">
        </div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-lg">
                    {{$obj->title}}
                </h1>
            </div>
        </div>
    </section>
    <section class="business section-padding" id="business">
        <div class="container">
            <h4 class="text-white ">
                {!! $obj->content !!}
            </h4>
            <div class="text-center">
                <a href="#" class="btn btn-primary btn-view">
                    @lang('home.read_more')
                </a>
            </div>


        </div>

    </section>
    <section class="article section-padding" id="article">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}" class="text-decoration-none">
                            <div class="article-content">
                                <div class="article-content_img">
                                    <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}">
                                        <img src="{{$blog->primary_image}}" alt="{{$blog->title}}"/>
                                    </a>
                                </div>
                                <h4>{{$blog->title}}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
