
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<script>
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

</script>
<script>


    {{--function toggle_status_customer(id) {--}}
    {{--    $.ajax({--}}
    {{--        method: "POST",--}}
    {{--        url: "{{ route('toggle-status-customer') }}",--}}
    {{--        data: {--}}
    {{--            customer_id: id--}}
    {{--        },--}}
    {{--        success: function (one, two, three) {--}}

    {{--            toastr.success('تم التعديل بنجاح')--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}

    $.ajaxSetup({
        headers:
            {'X-CSRF-TOKEN': '{{csrf_token()}}'},
        beforeSend: function () {
            $("#loading-show").addClass('modal-backdrop show');
            $("#text-overlay").fadeIn()
            $("#text-overlay").css({
                'position': 'absolute',
                'top': '50%',
                'left': '50%',
                'font-size': '50px',
                'color': 'white',
                'transform': ' translate(-50%, -50%)',
                '-ms-transform': 'translate(-50%, -50%)'
            });
        },
        complete: function (xhr, stat) {

            $("#loading-show").removeClass('modal-backdrop show');
            $("#text-overlay").fadeOut()
            $("#loading-show").addClass('fade');
        }
    });


</script>
@stack('js')
