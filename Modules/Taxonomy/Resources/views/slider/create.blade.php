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
                    <h3 class="card-title">Slider </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" novalidate="novalidate" action="{{route('admin.slider.store')}}" method="POST">
                    @csrf
                    <div class="m-3">
                        <h5 class="modal-title">Video - Image</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  mb-1 mt-1">
                                    <img id="image-filemanager"
                                         data-value=""
                                         onclick="togglemodalfilemanager(0)"
                                         class="mb-1 mt-1"
                                         src="{{old('',asset('images/boxed-bg.jpg'))}}"
                                         width="200">
                                    <div class="image-show">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label for="exampleInputPassword1">Title AR</label>
                                    <input class="form-control"
                                           name="title-ar"
                                          />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label for="exampleInputPassword2">Title EN</label>
                                    <input class="form-control"
                                           name="title-en"
                                          />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label for="exampleInputPassword2">Link</label>
                                    <input class="form-control"
                                           name="link[]"
                                         />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label for="exampleInputPassword2">Label Link Ar</label>
                                    <input class="form-control"
                                           name="label-ar"
                                         />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label for="exampleInputPassword2">Label Link En</label>
                                    <input class="form-control"
                                           name="label-en"
                                          />

                                </div>
                            </div>


                        </div>


                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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
    <script>
        function togglemodalfilemanager(param) {

            $('.bd-example-modal-lg').modal('toggle')
        }


    </script>
    <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            fm.$store.commit('fm/setFileCallBack', function (fileUrl) {

                $('#image-filemanager' ).attr('src', fileUrl)
                $('.image-show' ).html('<input type="hidden" name="primary_image" value="' + fileUrl + '">')

                $('.bd-example-modal-lg').modal('toggle')
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>
@endpush
