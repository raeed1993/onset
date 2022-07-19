@extends('admin.layout.master')
@section('title')
    @lang('user::site.users')
@endsection
@push('css')
    <style>
        .icon-font {
            font-size: 2px !important;
        }

        .form-font {
            font-size: 17px;
        }

    </style>
@endpush
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update <small>User</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{route('users.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('user::site.name')</label>
                            <input type="text"
                                   value="{{old('name',$user->name)}}"
                                   name="name"
                                   class="form-control"
                                   id="name"
                                   placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"
                                   value="{{old('email',$user->email)}}"
                                   name="email"
                                   class="form-control"
                                   id="email"
                                   placeholder="Enter Email">
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="phone">Phone</label>--}}
                        {{--                            <input type="number"--}}
                        {{--                                   value="{{old('phone',$user->email)}}"--}}
                        {{--                                   name="phone"--}}
                        {{--                                   class="form-control" id="phone"--}}
                        {{--                                   placeholder="Enter Phone">--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text"
                                   value="{{old('password')}}"
                                   name="password" class="form-control" id="password"
                                   placeholder="Enter Password">
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection


