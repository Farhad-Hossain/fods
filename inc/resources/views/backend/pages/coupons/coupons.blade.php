@extends('backend.master', ['title'=>'Coupons'])
@section('custom_style')
    <link href="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        @include('backend.message.emergency_form_validation')
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">Coupons</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        
                    </div>
                    <!--begin::Button-->
                    <a href="{{route('backend.settings.add_coupon_view')}}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Add coupon</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                @include('backend.inc.table.coupons')
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{!!asset('backend')!!}/assets/js/datatable.js"></script>
@endsection
