@extends('admin.layout.master')
@section('title','Contacts')
@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-6">
                        <h2 class="">
                            {{$table_name}}
                        </h2>
                    </div>
                </div>

                <!-- ./card-header -->
                <div class="card-body">
                    @if (isset($list)&&count($list)>0)

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="color: #f8310e">#</th>
                                <th style="color: #f8310e"> Name</th>

                                <th style="color: #f8310e">Phone Number</th>
                                <th style="color: #f8310e">Read</th>
                                <th style="color: #f8310e">Actions</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($list as $item)
                                <tr>
                                    <td>{{  $item->id}}</td>

                                    <td>{{  $item->name}}</td>
                                    <td>{{  $item->phone_number}}</td>
                                    <td>
                                        <input type="checkbox" name="my-checkbox"
                                               {{  !is_null($item->read_at)?'checked':''}}  data-bootstrap-switch
                                               data-off-color="danger" data-on-color="success" >
                                    </td>
                                    <td>
                                        <div class="row">

                                            <div class="col-6">
                                                <a href="{{route('admin.'.$route_name.'.show',$item->id)}}"
                                                   class="btn btn-outline-primary" >
                                                    Show
                                                </a>
                                            </div>

                                            <div class="col-6">
                                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                                    Delete
                                                </button>
                                            </div>


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            Are You Sure You Wont Delete {{$item->name}}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <form action="{{route('admin.'.$route_name.'.delete')}}" method="POST">
                                                                <input type="hidden" value="{{$item->id}}" name="taxonomy_id">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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
