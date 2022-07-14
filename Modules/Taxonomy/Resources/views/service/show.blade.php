@extends('admin.layout.master')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('title',$service->title)
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="card-title">Update <small>Service</small></h2>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" method="POST" action="{{route('admin.service.update')}}">
                    @csrf
                    <input name="taxonomy_id" value="{{$service->id}}" type="hidden">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title AR</label>
                            <input type="text"
                                   value="{{old('title-ar',$service->translate('ar')->title)}}"
                                   name="title-ar" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter title AR">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title EN</label>
                            <input type="text"
                                   value="{{old('title-en',$service->translate('en')->title)}}"
                                   name="title-en" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter title EN">
                        </div>
                        <div class="form-group  mb-1 mt-1">
                            <label class="">Primary Image</label>
                            <br>
                            <img id="image-filemanager0" onclick="togglemodalfilemanager(0)" data-value="0"
                                 class="mb-1 mt-1"
                                 src="{{old('primary-image',!is_null($service->primary_image)?$service->primary_image:asset('images/boxed-bg.jpg'))}}"
                                 width="100">
                            <div class="image-show0"></div>

                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status"
                                       {{$service->status? 'checked':''}} class="custom-control-input"
                                       id="exampleCheck1">
                                <label class="custom-control-label" for="exampleCheck1">Active</label>
                                <div id="checked-box">
                                    <input type="hidden" name="status" value="1">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mb-2 mt-2">
                            @if (isset($service->childs)&&count($service->childs)>0)
                                <button class="btn btn-primary" id="add-content-row"
                                        onclick="add_content_row({{count($service->childs)+1}})" type="button">add
                                    content
                                </button>
                            @else
                                <button class="btn btn-primary" id="add-content-row" type="button">add content</button>
                            @endif

                        </div>
                        <div class="row" id="contents-row">
                            @foreach($service->childs as $index=>$sub)

                                <div class="row" id="content-{{$index+1}}">
                                    <div class="col-md-5">
                                        <div class="form-group">

                                            <label for="exampleInputPassword1">Content AR</label>
                                            <textarea class="summernote"
                                                      name="services[{{$index+1}}][content-ar]">{!!  $sub->translate('ar')->content!!}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">

                                            <label for="exampleInputPassword2">Content EN</label>
                                            <textarea class="summernote"
                                                      name="services[{{$index+1}}][content-en]">{!!  $sub->translate('en')->content!!}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group  mb-1 mt-1">
                                            <label class="">Primary Image</label>
                                            <br>
                                            <img id="image-filemanager{{$index+1}}" data-value="{{$index+1}}"
                                                 onclick="togglemodalfilemanager({{$index+1}})" class="mb-1 mt-1"
                                                 src="{{old('primary-image',!is_null($sub->primary_image)?$sub->primary_image:'http://127.0.0.1:8000/storage/images/sales-for-last-7-days.png')}}"
                                                 width="200">
                                            <div class="image-show{{$index+1}}">
                                                <input type="hidden" value="{{$sub->primary_image}}"
                                                       name="services[{{$index+1}}][primary-image]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger" id="remove-content{{$index+1}}"
                                                onclick="removecontent({{$index+1}})" type="button">X
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

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
            //             terms: {
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
            $('#exampleCheck1').on('change', function (e) {
                if ($('#exampleCheck1').is('checked', true))
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
        @if (isset($service->childs)&&count($service->childs)>0)
        function add_content_row(param) {
            var count = param;
            array_contents.push({
                id: count
            });
            for (i = count; i < param + 1; i++)
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


        }
        @else
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
        @endif


        $(function () {

            // $('#add-content-row').on('click', function (e) {
            //
            // });

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
                // $('.image-show' + i).html('<input type="hidden" name="primary-image" value="' + fileUrl + '">')
                $('.bd-example-modal-lg').modal('toggle')
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>
@endpush
