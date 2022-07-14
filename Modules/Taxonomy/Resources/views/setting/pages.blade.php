@extends('admin.layout.master')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('content')
    <form action="{{route('admin.website.update')}}" method="POST">
        @csrf
        @foreach($data as $index=>$item)
            @include('taxonomy::setting.partials.page',['page'=>$item->translate('en')->slug,'param'=>$index])
        @endforeach

        <button type="submit" class="btn btn-primary"> Save</button>

    </form>  <br/>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @include('media::partials.filemanager')
            </div>
        </div>
    </div>
@endsection
@push('js')


    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        var i = 0;
        var page = '';

        function togglemodalfilemanagerPage(param, page_name) {
            i = param;
            page = page_name;
            $('.bd-example-modal-lg').modal('toggle')
        }
    </script>

    <script>

        $(function () {


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
                $('.image-show' + i).html('<input type="hidden" name="' + page + '-primary-image" value="' + fileUrl + '">')
                $('.bd-example-modal-lg').modal('toggle')
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>
@endpush
