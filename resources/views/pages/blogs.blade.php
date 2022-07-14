@extends('layouts.app')

@section('content')
    <section class="page-banner contact-us">
        <div class="container">
            <div class="page-title">
                <h1>
                    المدونة
                </h1>
            </div>
        </div>
    </section>
    <section class="article section-padding" id="article">
        <div class="container">

            <div class="row">

                @foreach($blogs as $blog)

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="article-content">
                            <div class="article-content_img">
                                <img src="{{$blog->primary_image}}" alt=""/>
                            </div>
                            <h4>{{$blog->title}}</h4>
                            <div class="text-white">
                                {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
                            </div>
                            <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}">
                                تابع القراءة>>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
