@extends('admin.layout.master')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
    <style>
        .imageuploadify-show .imageuploadify-images-list-show .imageuploadify-container-show button.btn-danger {
            position: absolute;
            top: 5px;
            right: 15px;
            width: 20px;
            height: 20px;
            border-radius: 15px;
            font-size: 10px;
            line-height: 1.42;
            padding: 2px 0;
            text-align: center;
            z-index: 3;

        }
    </style>
@endpush
@section('title',$project->title)
@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update <small>Project</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{route('admin.project.update')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$project->id}}" name="taxonomy_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Project Title AR</label>
                            <input type="text"
                                   value="{{old('title-ar',$project->translate('ar')->title)}}"
                                   name="title-ar" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter Project title AR">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Project Title EN</label>
                            <input type="text"
                                   value="{{old('title-en',$project->translate('en')->title)}}"
                                   name="title-en" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter Project title EN">
                        </div>


                        <div class="form-group">


                            <div class="form-group">
                                <label for="exampleInputPassword2">Services</label>
                                {{Form::select('service_id', $services, old('service_id',$project->parent_id),['class'=>'form-control select2'])}}
                            </div>

                        </div>

                        <div class="form-group  mb-1 mt-1">
                            <label class="">Primary Image</label>
                            <br>
                            <img id="image-filemanager" class="mb-1 mt-1"
                                 src="{{old('primary-image',!is_null($project->primary_image)?$project->primary_image:asset('images/boxed-bg.jpg'))}}"
                                 width="100">
                            <div class="image-show"></div>

                        </div>
                        <div class="form-group  mb-1 mt-1">
                            <label class="">Images</label>
                            <br>
                            <div class="imageuploadify-show row  ">
                                <div class="imageuploadify-images-list-show ">

                                    <br>
                                    <div id="images-filemanager-show">
                                        <img id="images-filemanager" class="m-1 "
                                             src="{{asset('images/boxed-bg.jpg')}}"
                                             width="100">
                                        <br>
                                        <br>
                                        <span class="mb-3 imageuploadify-message-show "> Project Old Images</span>

                                        <div class="row">
                                            @if (isset($project->image_link))
                                                @foreach($project->image_link as $index=>$img)

                                                    <div class="border col imageuploadify-container-show mr-1 ml-1"
                                                         id="images-list-{{$index}}">

                                                        <button type="button" class="btn btn-danger "
                                                                onclick="remove_old_image({{$index}})">x
                                                        </button>
                                                        <div class="imageuploadify-details--show">
                                                            <img src="{{$img->image}}" class="m-1 " width="150" height="100">
                                                            <input class="form-control" name="image_link[]" value="{{$img->link}}"
                                                                   placeholder="project link">
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="images-show">
                                @if (isset($project->image_link))
                                    @foreach($project->image_link as $index=>$img)

                                        <input type="hidden" id="input-images-list-{{$index}}" name="images[]"
                                               value="{{$img->image}}">
                                    @endforeach
                                @endif


                            </div>

                        </div>

                        <div class="form-group  mb-1 mt-1">
                            @if (isset($project->links)&&count($project->links)>0)
                                <button type="button" id="add-link" onclick="add_link_row({{count($project->links)}})"
                                        class="btn btn-primary">add link
                                </button>
                            @else
                                <button type="button" id="add-link" class="btn btn-primary">add link</button>
                            @endif

                            <div id="links-videos">
                                @if (isset($project->links))
                                    @foreach($project->links as $index=>$link)

                                        <div class="row mt-1   mb-2" id="link{{$index}}">
                                            <div class="col-md-8">
                                                <input name="links[{{$index}}]" value="{{$link}}" type="text"
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-danger"
                                                        onclick="remove_link({{$index}})">X
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" checked class="custom-control-input"
                                       id="exampleCheck1">
                                <label class="custom-control-label" for="exampleCheck1">Active</label>
                                <div id="checked-box">
                                    <input type="hidden" name="status" value="1">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            @include('media::partials.filemanager')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection
@push('js')
    <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
    <script>
        var primary = true;
        var links = [];
        var i = {{isset($project->images)?count($project->images)+1:0}};

        function remove_link(param) {

            $('#link' + param).remove();
        }

        function remove_old_image(param) {

            $('#input-images-list-' + param).remove()
            $('#images-list-' + param).remove();
        }

        $(function () {

            // $.validator.setDefaults({
            //     submitHandler: function () {
            //         alert("Form successful submitted!");
            //     }
            // });
            // $('#quickForm').validate({
            //     rules: {
            //         title: {
            //             required: true,
            //         },
            //
            //         status: {
            //             required: true
            //         },
            //     },
            //     messages: {
            //         title: {
            //             required: "Please enter a title ",
            //         },
            //         content: {
            //             required: "Please provide a content",
            //             minlength: "Your password must be at least 5 characters long"
            //         },
            //         status: "Please accept our terms"
            //     },
            //     errorElement: 'span',
            //     errorPlacement: function (error, element) {
            //         error.addClass('invalid-feedback');
            //         element.closest('.form-group').append(error);
            //     },
            //     highlight: function (element, errorClass, validClass) {
            //         $(element).addClass('is-invalid');
            //     },
            //     unhighlight: function (element, errorClass, validClass) {
            //         $(element).removeClass('is-invalid');
            //     }
            // });
            $('#exampleCheck1').on('change', function (e) {
                if ($('#exampleCheck1').is('checked', true))
                    $('#checked-box').html('<input type="hidden" name="status" value="1">')
                else
                    $('#checked-box').html('<input type="hidden" name="status" value="0">')
            })
            $('.select2').select2()
            $('#image-filemanager').on('click', function () {
                primary = true;
                $('.bd-example-modal-lg').modal('toggle')
            })
            $('#images-filemanager').on('click', function () {
                primary = false;
                $('.bd-example-modal-lg').modal('toggle')
            })

        });
        @if (isset($project->links)&&count($project->links)>0)
        function add_link_row(param) {
            var count = param;
            links.push({
                id: count
            });
            for (var i = count; i < param + 1; i++)
                $('#links-videos').append(
                    '<div class="row mt-1   mb-2" id="link' + i + '">' +
                    '<div class="col-md-8">' +
                    '<input name="links[' + i + ']" type="text" class="form-control">' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<button type="button" class="btn btn-danger" onclick="remove_link(' + i + ')">X</button> ' +
                    '</div>' +
                    '</div>'
                )
        }

        @else
        $(function () {
            $('#add-link').on('click', function (e) {
                var count = links.length;
                links.push({
                    id: count
                });
                for (var i = count; i < links.length; i++)
                    $('#links-videos').append(
                        '<div class="row mt-1   mb-2" id="link' + i + '">' +
                        '<div class="col-md-8">' +
                        '<input name="links[' + i + ']" type="text" class="form-control">' +
                        '</div>' +
                        '<div class="col-md-4">' +
                        '<button type="button" class="btn btn-danger" onclick="remove_link(' + i + ')">X</button> ' +
                        '</div>' +
                        '</div>'
                    )
            })
        })


        @endif

    </script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            fm.$store.commit('fm/setFileCallBack', function (fileUrl) {

                if (primary) {
                    $('#image-filemanager').attr('src', fileUrl)
                    $('.image-show').html('<input type="hidden" name="primary-image" value="' + fileUrl + '">')
                    $('.bd-example-modal-lg').modal('toggle')
                } else {
                    $('#images-filemanager-show .row').append(
                        '  <div class="border col imageuploadify-container-show ml-1 mr-1"  id="images-list-' + i + '">' +
                        ' <button type="button" class="btn btn-danger " onclick="remove_old_image(' + i + ')">x</button>' +
                        '<div class="imageuploadify-details--show">' +
                        '<img src="' + fileUrl + '" class="m-1 " width="150" height="100">' +
                        '  <input class="form-control" name="image_link[]" placeholder="project link">' +
                        '  </div>' +
                        '</div>'
                    )

                    $('.images-show').append('<input type="hidden" id="input-images-list-' + i + '" name="images[]" value="' + fileUrl + '">')
                    i++;
                    toastr.success('Selected Done !')
                }


                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>


@endpush
