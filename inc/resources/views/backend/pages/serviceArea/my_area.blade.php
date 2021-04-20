@extends('backend.master', ['title'=>'Coverage Area'])
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">Service Coverage Area</h3>
                </div>
            </div>
            <div class="card-body">
                @if ( \App\Helpers\Helper::driver() ) 
                    @include ('backend.inc.form.driver_service_area') 
                @elseif ( \App\Helpers\Helper::restaurant() ) 
                    @include ('backend.inc.form.restaurant_service_area') 
                @endif
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script type="text/javascript" src="{{asset('backend/assets/js/customs/')}}/role_manage.js"></script>
    <script type="text/javascript">
        $("#rest_select_control").change(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let url = "{!! route('backend.area_coverage.getRestaurantServiceArea') !!}";
            let restaurant_id = $(this).val();
            
            $.ajax({
                type: 'GET',
                url: url,
                data: {'restaurant_id': restaurant_id},
                success: function (data) {
                    $("#form_container").empty();
                    $("#form_container").append(data);
                }
            });


        })
    </script>
@endsection
