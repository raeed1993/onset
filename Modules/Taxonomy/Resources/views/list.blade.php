@extends('admin.layout.master')
@section('title',$table_name)
@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @include('admin.partials.table.add_new',['route'=>'admin.'.$route_name.'.create','table_name'=>$table_name])

                </div>

                <!-- ./card-header -->
                    <div class="card-body">
                        @if (isset($list)&&count($list)>0)
                        @include('admin.partials.table.table',['list'=>$list,'route_name'=>$route_name])
                        @else
                            <div>There Is No {{$table_name}} Yet.</div>
                        @endif
                    </div>

                <!-- /.card-body -->


            </div>
            <!-- /.card -->
        </div>
    </div>


@endsection
