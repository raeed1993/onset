@extends('admin.layout.master')

@section('content')
   @include('media::partials.filemanager')
@endsection
@push('js')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

            fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
                console.log(fileUrl)
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });

    </script>

@endpush
