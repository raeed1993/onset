@extends('admin.layout.master')
@section('title')
    @lang('user::site.users')
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!-- page-header-->
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">@lang('user::site.users')</div>

            </div>
            <!--end breadcrumb-->
            <!--EN FOR  page-header-->
            <div class="card border-top border-0 border-4 border-primary table-responsive">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-primary pt-2"></i>
                    </div>


                </div>
                <div class="card-header">
                    @include('admin.partials.table.add_new',['route'=>'users.create','table_name'=>'users'])

                </div>
                <div class="card-body ">
                    @if ($users->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="color: #f8310e">#</th>
                                    <th style="color: #f8310e"> Name</th>
                                    <th style="color: #f8310e">email</th>
                                    <th style="color: #f8310e">Status</th>
                                    <th style="color: #f8310e">Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $item)
                                    <tr>
                                        <td>{{  $item->id}}</td>
                                        <td>{{  $item->name}}</td>
                                        <td>{{  $item->email}}</td>
                                        <td>
                                            <input type="checkbox"
                                                   name="my-checkbox"
                                                   data-bootstrap-switch
                                                   {{is_null($item->email_verified_at)?'checked':''}}
                                                   value="{{$item->id}}"
                                                   data-off-color="danger"
                                                   data-on-color="success">
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route('users.edit',$item->id)}}"
                                                       class="btn btn-outline-primary">
                                                        Edit
                                                    </a>
                                                </div>

                                                <div class="col-6">
                                                    <button class="btn btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal{{$item->id}}">
                                                        Delete
                                                    </button>
                                                </div>


                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                Are You Sure You Wont Delete {{$item->name}}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <form action="{{route('users.delete',$item->id)}}"
                                                                      method="POST">
                                                                    <input type="hidden" value="{{$item->id}}"
                                                                           name="user_id">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">
                                                                        Delete
                                                                    </button>
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

                            <div class="mt-3 mb-3 mx-3">
                                {{--                                {{ $users->links('vendor.pagination.bootstrap-4') }}--}}
                            </div>
                            @else
                                <h2>@lang('taxonomy::site.not_data_found')</h2>
                            @endif
                        </div>
                </div>
            </div>
        </div>


        @endsection
        @push('js')

            <script>
                $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function (event, state) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('admin.user-toggle-status') }}",
                        data: {
                            user_id: event.target.value
                        },
                        success: function (one, two, three) {
                            toastr.success('تم التعديل بنجاح')
                        }
                    });
                });

            </script>
    @endpush
