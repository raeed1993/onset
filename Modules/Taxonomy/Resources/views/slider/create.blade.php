@extends('admin.layout.master')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('title','Sliders')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sliders </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{route('admin.slider.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (isset($list)&&count($list)>0)

                            <div class="form-group mb-2 mt-2">
                                <button class="btn btn-primary" id="add-content-row"
                                        onclick="add_content_row({{count($list)+1}})" type="button">
                                    <i class="fa fa-plus"></i> Add content
                                </button>
                            </div>
                        @else
                            <div class="form-group mb-2 mt-2">
                                <button class="btn btn-primary" id="add-content-row" type="button"><i class="fa fa-plus"></i> Add content</button>
                            </div>
                        @endif


                        <div class="row" id="contents-row">

                            @foreach($list as $index=>$sub)
                                <div class="container" id="content-{{$index+1}}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Video - Image</h5>
                                            <button type="button" class=" btn btn-danger"
                                                    id="remove-content{{$index+1}}"
                                                    onclick="removecontent({{$index+1}})" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group  mb-1 mt-1">
                                                        <img id="image-filemanager{{$index+1}}"
                                                             data-value="{{$index+1}}"
                                                             onclick="togglemodalfilemanager({{$index+1}})"
                                                             class="mb-1 mt-1"
                                                             src="{{old($sub['primary_image'],isset($sub['primary_image'])?$sub['primary_image']:'http://127.0.0.1:8000/storage/images/sales-for-last-7-days.png')}}"
                                                             width="200">
                                                        <div class="image-show{{$index+1}}">
                                                            <input type="hidden" value="{{$sub['primary_image']}}"
                                                                   name="sliders[{{$index+1}}][primary_image]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label for="exampleInputPassword1">Title AR</label>
                                                        <input class="form-control"
                                                               name="sliders[{{$index+1}}][title-ar]"
                                                               value="{{ isset($sub->title)?'': $sub->translate('ar')->title}}"/>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label for="exampleInputPassword2">Title EN</label>
                                                        <input class="form-control"
                                                               name="sliders[{{$index+1}}][title-en]"
                                                               value="{{  isset($sub->title)?'':$sub->translate('en')->title }}"/>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label for="exampleInputPassword2">Link</label>
                                                        <input class="form-control"
                                                               name="sliders[{{$index+1}}][link][]"
                                                               value="{{  is_null($sub->links)?'':$sub->links[0]}}"/>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


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
        var i = {{count($list)+1}};

        function togglemodalfilemanager(param) {
            i = param;
            $('.bd-example-modal-lg').modal('toggle')
        }

        function removecontent(param) {

            $('#content-' + param).remove();
        }


        $(function () {

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
        @if (isset($list)&&count($list)>0)
        function add_content_row(param) {
            var count = param;
            array_contents.push({
                id: count
            });
            for (i = count; i < param + 1; i++)
                $('#contents-row').append(
                    ' <div class="container" id="content-' + i + '">' +

                    ' <div class="modal-content">' +
                    '<div class="modal-header">' +
                    '<h5 class="modal-title">Video - Image</h5>' +
                    '<button type="button" class=" btn btn-danger" id="remove-content' + i + '" onclick="removecontent(' + i + ')"  data-dismiss="modal" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>' +
                    '<div class="modal-body">' +


                    '<div >' +
                    '<div class="col-md-12" >' +


                    '<div class="col-md-3">' +
                    '<div class="form-group  mb-1 mt-1">' +


                    '<img id="image-filemanager' + i + '"data-value="' + i + '" onclick="togglemodalfilemanager(' + i + ')" class="mb-1 mt-1"src="{{old('primary_image','http://127.0.0.1:8000/storage/images/sales-for-last-7-days.png')}}"width="200" >' +
                    '<div class="image-show' + i + '">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +

                    '</div>' +
                    '<div class="row">' +

                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label  for="exampleInputPassword1">Title AR</label>' +
                    '<input class="form-control" name="sliders[' + i + '][title-ar]"/>' +
                    '</div>' +
                    '</div>' +

                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label for="exampleInputPassword2">Title EN</label>' +
                    '<input  class="form-control" name="sliders[' + i + '][title-en]"/>' +
                    '</div>' +
                    '</div>' +

                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label  for="exampleInputPassword1">Link</label>' +
                    '<input class="form-control" placeholder="#" name="sliders[' + i + '][link][]"/>' +
                    '</div>' +
                    '</div>' +


                    ' </div>' +
                    ' </div>' +

                    ' </div>' +
                    ' </div>' +
                    '<hr/>' +
                    ' </div>'
                );


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
                        ' <div class="container" id="content-' + i + '">' +

                        ' <div class="modal-content">' +
                        '<div class="modal-header">' +
                        '<h5 class="modal-title">Video - Image</h5>' +
                        '<button type="button" class=" btn btn-danger" id="remove-content' + i + '" onclick="removecontent(' + i + ')"  data-dismiss="modal" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>' +
                        '<div class="modal-body">' +


                        '<div >' +
                        '<div class="col-md-12" >' +


                        '<div class="col-md-3">' +
                        '<div class="form-group  mb-1 mt-1">' +


                        '<img id="image-filemanager' + i + '"data-value="' + i + '" onclick="togglemodalfilemanager(' + i + ')" class="mb-1 mt-1"src="{{old('primary_image','http://127.0.0.1:8000/storage/images/sales-for-last-7-days.png')}}"width="200" >' +
                        '<div class="image-show' + i + '">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<div class="row">' +

                        '<div class="col-md-4">' +
                        '<div class="form-group">' +
                        '<label  for="exampleInputPassword1">Title AR</label>' +
                        '<input class="form-control" name="sliders[' + i + '][title-ar]"/>' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-4">' +
                        '<div class="form-group">' +
                        '<label for="exampleInputPassword2">Title EN</label>' +
                        '<input  class="form-control" name="sliders[' + i + '][title-en]"/>' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-4">' +
                        '<div class="form-group">' +
                        '<label  for="exampleInputPassword1">Link</label>' +
                        '<input class="form-control" placeholder="#" name="sliders[' + i + '][link][] "/>' +
                        '</div>' +
                        '</div>' +


                        ' </div>' +
                        ' </div>' +

                        ' </div>' +
                        ' </div>' +
                        '<hr/>' +
                        ' </div>'
                    );


            });

        });
        @endif

    </script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            fm.$store.commit('fm/setFileCallBack', function (fileUrl) {

                $('#image-filemanager' + i).attr('src', fileUrl)
                if (i == 0)
                    $('.image-show' + i).html('<input type="hidden" name="primary_image" value="' + fileUrl + '">')
                else
                    $('.image-show' + i).append('<input type="hidden" name="sliders[' + i + '][primary_image]" value="' + fileUrl + '">')
                $('.bd-example-modal-lg').modal('toggle')
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>
@endpush
