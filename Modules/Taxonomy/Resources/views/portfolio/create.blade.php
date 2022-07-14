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
@section('title','Project')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create <small>Project</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{route('admin.project.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Project Title AR</label>
                            <input type="text"
                                   value="{{old('title-ar')}}"
                                   name="title-ar" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter Project title AR">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Project Title EN</label>
                            <input type="text"
                                   value="{{old('title-en')}}"
                                   name="title-en" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter Project title EN">
                        </div>


                        <div class="form-group">


                            <div class="form-group">
                                <label for="exampleInputPassword2">Services</label>

                                {{Form::select('service_id', $services, old('service_id'),['class'=>'form-control select2'])}}

                            </div>

                        </div>

                        <div class="form-group  mb-1 mt-1">
                            <label class="">Primary Image</label>
                            <br>
                            <img id="image-filemanager" class="mb-1 mt-1"
                                 src="{{old('primary-image',asset('images/boxed-bg.jpg'))}}"
                                 width="100">
                            <div class="image-show"></div>

                        </div>
                        <div class="form-group  mb-1 mt-1">
                            <label class="">Images</label>
                            <br>
                            <div class="imageuploadify-show row  ">
                                <div class="imageuploadify-images-list-show ">

                                    <div id="images-filemanager-show" class="mb-1 mt-1">
                                        <img id="images-filemanager" class="m-1 "
                                             src="{{old('primary-image',asset('images/boxed-bg.jpg'))}}"
                                             width="100">
                                        <br>
                                        <br>
                                        <div class="row"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="images-show"></div>

                        </div>

                        <div class="form-group  mb-1 mt-1">
                            <button type="button" id="add-link" class="btn btn-primary">add link</button>
                            <div id="links-videos"></div>
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
        var i = 0;

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
            $('.select2').select2()
            $('#image-filemanager').on('click', function () {
                primary = true;
                $('.bd-example-modal-lg').modal('toggle')
            })
            $('#images-filemanager').on('click', function () {
                primary = false;
                $('.bd-example-modal-lg').modal('toggle')
            })
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
            $('#exampleCheck1').on('change', function (e) {
                if ($('#exampleCheck1').is('checked', true))
                    $('#checked-box').html('<input type="hidden" name="status" value="1">')
                else
                    $('#checked-box').html('<input type="hidden" name="status" value="0">')
            })
        });
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
                        '<div class="col imageuploadify-container-show" id="images-list-' + i + '">' +
                        '<button type="button" class="btn btn-danger " onclick="remove_old_image(' + i + ')">x</button>' +
                        ' <div class="imageuploadify-details--show">' +
                        '<img src="' + fileUrl + '" class="m-1 " width="100">' +
                        '</div>' +
                        '</div>')
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
