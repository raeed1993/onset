@extends('admin.layout.master')
@section('title','contact')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Show <small>Message</small></h3>
                </div>
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Name
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$contact->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Email
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$contact->email}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Phone Number
                            </h4>
                        </div>
                        <div class="col-md-8">
                            {{$contact->phone_number}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>
                                Message
                            </h4>
                        </div>

                        <div class="col-md-8 dark-mode content-wrapper p-2">
                            {{$contact->content}}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection

