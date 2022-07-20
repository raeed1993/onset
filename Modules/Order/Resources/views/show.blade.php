@extends('admin.layout.master')
@section('title','order')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Show <small>Order</small></h3>
                </div>
                <div class="container-fluid p-3">


                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Name
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$order->full_name}}
                        </div>
                    </div><hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Email
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$order->email}}
                        </div>
                    </div><hr/>

                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Phone Number
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$order->phone_number}}
                        </div>
                    </div><hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Project Name
                            </h4>
                        </div>

                        <div class="col-md-8    p-2">
                            {{$order->project_name}}
                        </div>
                    </div><hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Type Project
                            </h4>
                        </div>

                        <div class="col-md-8     p-2">
                            {{$order->type_project}}
                        </div>
                    </div><hr/>
                    @if ($order->type=='photography_show')


                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    purpose_photography_video
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->purpose_photography_video}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    type_services
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->type_services}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    number_shooting_days
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->number_shooting_days}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    camera_count
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->camera_count}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    video_duration
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->video_duration}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    aerial_photography
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->aerial_photography}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    include_grafic_video
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->include_grafic_video}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    include_voice_comment
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->include_voice_comment}}
                            </div>
                        </div><hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    link_like_video
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                <a href="{{$order->link_like_video}}">
                                    {{$order->link_like_video}}
                                </a>
                            </div>
                        </div><hr/>

                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                note
                            </h4>
                        </div>

                        <div class="col-md-8      p-2">

                            {{$order->note}}

                        </div>
                    </div><hr/>

                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection

