@extends('admin.layout.master')
@section('title',$table_name)
@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @include('admin.partials.table.add_new',['route'=>'admin.'.$route_name.'.create','table_name'=>$table_name])

                </div>

                <!-- ./card-header -->
                <div class="card-body">
                    @if (isset($list)&&count($list)>0)
                        @include('admin.partials.table.table',['list'=>$list,'route_name'=>$route_name])
                    @else
                        <div>There Is No {{$table_name}} Yet.</div>
                    @endif
                </div>

                <!-- /.card-body -->


            </div>
            <!-- /.card -->
        </div>
    </div>


@endsection
@push('js')

    <script>
        $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function (event, state) {
            $.ajax({
                method: "POST",
                url: "{{ route('admin.taxonomy-toggle-status') }}",
                data: {
                    taxonomy_id: event.target.value
                },
                success: function (one, two, three) {
                    toastr.success('تم التعديل بنجاح')
                }
            });
        });

    </script>
@endpush
