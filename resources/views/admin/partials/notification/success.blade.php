@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close text-danger" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{session('success')}}
    </div>
@endif