@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=> isset($obj->images)?$obj->images[0]:$obj->primary_image,
                              'page'=>$obj->title,
                              'desc'=>$obj->title,
                              'updated_time'=>$obj->updated_at,
                              'published_time'=>$obj->created_at])
@endsection
@push('css')
    <style>
        .img-banner {
            content: "";
            width: 100%;
            height: 100%;
            background-image: url('{{isset($obj->images)?$obj->images[0]:''}}');
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

    {{--    <section class="page-banner contact-us">--}}
    <section class=" page-banner photography">
        <div class="img-banner">
{{--            <img src="{{isset($obj->images)?$obj->images[0]:''}}" alt=" {{$obj->title}}">--}}
        </div>
        <div class="container">
            {{--            <div class="content-service">--}}
            <div class="page-title">
                <h1 class="secondary">
                    {{$obj->title}}
                </h1>

            </div>
        </div>
    </section>
    <section class="business section-padding" id="business">
        <div class="container">

            @if (isset($obj->childs))
                <div class="row">
                    @foreach($obj->childs as $index=>$child)

                        @if ($index%2==0)
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="content-business">
                                    <div class="content-business_img">
                                        <img src="{{$child->primary_image}}" alt="{{$obj->title}}"/>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="content-business">

                                    <h3 class="text-white">
                                        {!! $child->content!!}
                                    </h3>


                                </div>
                            </div>
                        @else
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="content-business">

                                    <h3 class="text-white ">
                                        {!! $child->content!!}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="content-business">
                                    <div class="content-business_img">
                                        <img src="{{$child->primary_image}}" alt="{{$obj->title}}"/>
                                    </div>


                                </div>
                            </div>

                        @endif

                    @endforeach
                </div>
            @endif
                @php($projects = $obj->projects_service->orderBy('id','desc')->limit(3)->get() )

            @if (count($projects)>0)
                    <h4 class="text-center text-white  ">
                    @lang('pages.from_our_portfolio') {{   $obj->title}}
                </h4>
                <div class="row">

                    @foreach($projects as $child)


                        @if (isset($child->links)&&count($child->links)>0)
                            <div class="col-sm-6 col-md-3 col-lg-3 ">
                                <div class="content-business">
                                    <div class=" video-normal-show ">
                                        <iframe
                                            width="100%"
                                            src="{{$child->links[0]}}"
                                            title="{{$child->title}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>

                        @elseif(isset($child->images)&&count($child->images)>0)

                            <div class="col-sm-6 col-md-3 col-lg-3 ">
                                <div class="content-business">
                                    <div class="image-normal-show ">
                                        <img src="{{$child->images[0]}}" alt="{{$child->title}}">
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="{{route('taxonomy.show',$projects[0]->translate('en')->slug)}}"
                       class="btn btn-primary btn-view">
                        @lang('pages.see_all_projects')
                    </a>
                </div>
            @endif

        </div>
    </section>
@endsection
