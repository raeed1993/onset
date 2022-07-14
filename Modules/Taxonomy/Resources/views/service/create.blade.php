@extends('admin.layout.master')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('title','Service')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create <small>Service</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{route('admin.service.store')}}" method="POST">
                  @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title AR</label>
                            <input type="text"
                                   value="{{old('title-ar')}}"
                                   name="title-ar" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter title AR">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title EN</label>
                            <input type="text"
                                   value="{{old('title-en')}}"
                                   name="title-en" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter title EN">
                        </div>

                        <div class="form-group  mb-1 mt-1">
                            <label class="">Primary Image</label>
                            <br>
                            <img id="image-filemanager0" onclick="togglemodalfilemanager(0)" data-value="0"
                                 class="mb-1 mt-1"
                                 src="{{old('primary-image','http://127.0.0.1:8000/storage/images/sales-for-last-7-days.png')}}"
                                 width="100">
                            <div class="image-show0"></div>

                        </div>

                        <div class="form-group mb-2 mt-2">
                            <button class="btn btn-primary" id="add-content-row" type="button">add content</button>
                        </div>

                        <div class="row" id="contents-row">

                        </div>

                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status-toggle" checked class="custom-control-input"
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
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        var i = 0;

        function togglemodalfilemanager(param) {
            i = param;
            $('.bd-example-modal-lg').modal('toggle')
        }

        function removecontent(param) {

            $('#content-' + param).remove();
        }


        $(function () {
        //     $.validator.setDefaults({
        //         submitHandler: function () {
        //             alert("Form successful submitted!");
        //         }
        //     });
        //     $('#quickForm').validate({
        //         rules: {
        //             title: {
        //                 required: true,
        //             },
        //             content: {
        //                 required: true,
        //                 minlength: 5
        //             },
        //             status: {
        //                 required: true
        //             },
        //         },
        //         messages: {
        //             title: {
        //                 required: "Please enter a title address",
        //             },
        //             content: {
        //                 required: "Please provide a content",
        //                 minlength: "Your password must be at least 5 characters long"
        //             },
        //             terms: "Please accept our terms"
        //         },
        //         errorElement: 'span',
        //         errorPlacement: function (error, element) {
        //             error.addClass('invalid-feedback');
        //             element.closest('.form-group').append(error);
        //         },
        //         highlight: function (element, errorClass, validClass) {
        //             $(element).addClass('is-invalid');
        //         },
        //         unhighlight: function (element, errorClass, validClass) {
        //             $(element).removeClass('is-invalid');
        //         }
        //     });
        //
            $('#exampleCheck1').on('change',function (e) {
                if( $('#exampleCheck1').is('checked',true))
                    $('#checked-box').html('<input type="hidden" name="status" value="1">')
                else
                    $('#checked-box').html('<input type="hidden" name="status" value="0">')
            })
        });
    </script>

    <script>
        var array_contents = [{
            id: 0
        }];

        $(function () {

            $('#add-content-row').on('click', function (e) {
                var count = array_contents.length;
                array_contents.push({
                    id: count
                });
                for (i = count; i < array_contents.length; i++)
                    $('#contents-row').append(
                        '  <div class="row" id="content-' + i + '">' +
                        '  <div class="col-md-5">' +
                        '<div class="form-group">' +

                        '<label for="exampleInputPassword1">Content AR</label>' +
                        ' <textarea class="summernote"  name="services[' + i + '][content-ar]"></textarea>' +

                        ' </div>' +
                        '  </div>' +
                        '   <div class="col-md-5">' +
                        ' <div class="form-group">' +

                        '  <label for="exampleInputPassword2">Content EN</label>' +
                        '  <textarea class="summernote"  name="services[' + i + '][content-en]"></textarea>' +

                        '   </div>' +
                        ' </div>' +
                        ' <div class="col-md-1">' +
                        '   <div class="form-group  mb-1 mt-1">' +
                        ' <label class="">Primary Image</label>' +
                        '  <br>' +
                        '<img id="image-filemanager' + i + '"data-value="' + i + '" onclick="togglemodalfilemanager(' + i + ')" class="mb-1 mt-1"src="{{old('primary-image','http://127.0.0.1:8000/storage/images/sales-for-last-7-days.png')}}"width="200" >' +
                        '  <div class="image-show' + i + '">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        ' <div class="col-md-1">' +
                        '    <button class="btn btn-danger" id="remove-content' + i + '" onclick="removecontent(' + i + ')" type="button">X</button>' +
                        ' </div>' +
                        ' </div>'
                    );


                $('.summernote').summernote()


            });

            $('.summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        });


    </script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            fm.$store.commit('fm/setFileCallBack', function (fileUrl) {

                $('#image-filemanager' + i).attr('src', fileUrl)
                if (i == 0)
                    $('.image-show' + i).html('<input type="hidden" name="primary-image" value="' + fileUrl + '">')
                else
                    $('.image-show' + i).append('<input type="hidden" name="services[' + i + '][primary-image]" value="' + fileUrl + '">')
                $('.bd-example-modal-lg').modal('toggle')
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>
@endpush
