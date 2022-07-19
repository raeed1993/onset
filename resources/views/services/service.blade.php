@extends('layouts.app')

@section('content')

    <section class="page-banner contact-us">
        <div class="img-banner">
            <img src="{{$obj->images[0]}}" alt="">
        </div>
        <div class="container">
            <div class="content-service">
                <h1 class="">
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

            <h4 class="text-center text-black content-service text-lg w-50 pl-2 pr-2 mb-2">
                من أعمالنا في {{   $obj->title}}
            </h4>
            <div class="row">
                @php($projects = $obj->projects_service->orderBy('id','desc')->limit(3)->get() )
                @foreach($projects as $child)


                    @if (isset($child->links))
                        <div class="col-sm-6 col-md-3 col-lg-3 ">
                            <div class="content-business">
                                <div class=" video-normal-show ">
                                    <iframe
                                        src="{{$child->links[0]}}"
                                        title="{{$child->title}}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>

                    @elseif(isset($child->images))

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
                <a href="" class="btn btn-primary btn-view">
                    مشاهدة جيمع الأعمال
                </a>
            </div>
        </div>
    </section>
@endsection