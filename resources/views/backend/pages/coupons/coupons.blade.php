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
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Promo Code</th>
                            <th>Discount Price</th>
                            <th>Applicable For</th>
                            <th>Limit</th>
                            <th>Selling Count</th>
                            <th>Available</th>
                            <th>Valid Till</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discount_coupons as $coupon)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$coupon->promo_code}}</td>
                                <td>
                                    <b>{{$coupon->discount_price}}</b>
                                    @if($coupon->promo_type==1)
                                        <b class="text-primary">(Flate rate)</b>
                                    @else
                                        <b class="text-primary">(In percentage)</b>
                                    @endif
                                </td>
                                <td>
                                    @if($coupon->applicable_for==1)
                                        All Users
                                    @else
                                        New Users
                                    @endif
                                </td>
                                <td>{{$coupon->promo_code_limit}}</td>
                                <td>{{$coupon->selling_count}}</td>
                                <td>{{$coupon->promo_code_limit-$coupon->selling_count}}</td>
                                <td>
                                    @if($coupon->valid_date < now())
                                        <b class="bg-danger text-light">{{$coupon->valid_date}}</b>
                                    @else
                                        <b class="text-success">{{$coupon->valid_date}}</b>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('backend.settings.edit_coupon_view', $coupon->id)}}" class="text-primary mr-2">
                                        <i class="far fa-edit text-primary"></i>
                                    </a>
                                    <a href="{{route('backend.settings.delete_coupon_submit', base64_encode($coupon->id) )}}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                        <i class="far fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
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
