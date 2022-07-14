@extends('admin.layout.master')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit <small>Meta</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Title AR</label>
                            <input type="text"
                                   value="{{old('title-ar',$meta->translate('ar')->title)}}"
                                   name="title-ar" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter title AR">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Title EN</label>
                            <input type="text"
                                   value="{{old('title-en',$meta->translate('en')->title )}}"
                                   name="title-en" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter title EN">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputPassword1">Meta Description AR</label>
                            <textarea class="form-control" type="text"
                                      name="content-ar">{{old('content-ar',$meta->translate('en')->content)}}</textarea>

                        </div>
                        <div class="form-group">

                            <label for="exampleInputPassword2">Meta Description EN</label>
                            <textarea class="form-control" type="text"
                                      name="content-en">{{old('content-en',$meta->translate('ar')->content)}}</textarea>

                        </div>
                        <div class="form-group  mb-1 mt-1">
                            <label class="">Meta Image</label>
                            <br>
                            <img id="image-filemanager" class="mb-1 mt-1"
                                 src="{{old('primary-image',!is_null($meta->primary_image)?$meta->primary_image:asset('images/boxed-bg.jpg'))}}"
                                 width="100"
                                 data-toggle="modal"
                                 data-target=".bd-example-modal-lg">
                            <div class="image-show"></div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Url</label>
                            <input type="text"
                                   value="{{old('links',$meta->links[0] )}}"
                                   name="links" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter title EN">
                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" checked class="custom-control-input"
                                       id="exampleCheck1">
                                <label class="custom-control-label" for="exampleCheck1">Active</label>
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

    <script>
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    content: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    title: {
                        required: "Please enter a title address",
                    },
                    content: {
                        required: "Please provide a content",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    status: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            fm.$store.commit('fm/setFileCallBack', function (fileUrl) {

                $('#image-filemanager').attr('src', fileUrl)
                $('.image-show').html('<input type="hidden" name="primary-image" value="' + fileUrl + '">')
                $('.bd-example-modal-lg').modal('toggle')
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>

@endpush
