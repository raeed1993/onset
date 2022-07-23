@extends('admin.layout.master')
@section('title','order')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Show <small>Order </small> {{   $order->type =='visual_identity'?'هوية بصرية':'عرض تصوير'}}</h3>
                </div>
                <div class="container-fluid p-3">

                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                @lang('order::form.full_name')
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$order->full_name}}
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                @lang('order::form.email')
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$order->email}}
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                @lang('order::form.phone_number')
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$order->phone_number}}
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                @lang('order::form.project_name')
                            </h4>
                        </div>

                        <div class="col-md-8    p-2">
                            {{$order->project_name}}
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                @lang('order::form.project_type_active')
                            </h4>
                        </div>

                        <div class="col-md-8     p-2">
                            {{$order->type_project}}
                        </div>
                    </div>
                    <hr/>
                    @if ($order->type=='photography_show')
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.purpose_photography_video')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->purpose_photography_video}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.service_type')
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->type_services}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.number_shooting_days')
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->number_shooting_days}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.camera_count')
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->camera_count}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.video_duration')
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->video_duration}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.aerial_photography')
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">

                                {{$order->aerial_photography == 1?trans('form.yse'):trans('form.no')}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.include_grafic_video')
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->include_grafic_video == 1?trans('form.yse'):trans('form.no')}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.include_voice_comment')
                                </h4>
                            </div>

                            <div class="col-md-8      p-2">
                                {{$order->include_voice_comment == 1?trans('form.yse'):trans('form.no')}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.link_like_video')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                <a href="{{$order->link_like_video}}">
                                    {{$order->link_like_video}}
                                </a>
                            </div>
                        </div>
                        <hr/>
                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('order::form.target_segment')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->target_segment}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('form.competitive_advantage_the_project')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->feature_project}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('form.most_important_services_products_provided_project')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->services_products_project}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('form.logo_type')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->type_logo}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('form.looking_at_other_logos_which_logos_are_better')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->logo_prefer}}
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    @lang('form.about_project')
                                </h4>
                            </div>

                            <div class="col-md-8    p-2">
                                {{$order->about_project}}
                            </div>
                        </div>
                        <hr/>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                @lang('order::form.additional_note')
                            </h4>
                        </div>

                        <div class="col-md-8      p-2">

                            {{$order->note}}

                        </div>
                    </div>
                    <hr/>

                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection

