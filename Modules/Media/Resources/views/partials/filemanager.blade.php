
@push('css')
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
    <style>
        .file-manager {
            color: black;
        }
    </style>
@endpush
<div class="row file-manager">
    <div class="col-md-12" id="fm-main-block">
        <div id="fm"></div>
    </div>
</div>

