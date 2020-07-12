@extends('backend.master')
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
                    <h3 class="card-label">{!! __('order.order_status_list') !!}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Export</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav flex-column nav-hover">
                                <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-print"></i>
                                        <span class="nav-text">Print</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-copy"></i>
                                        <span class="nav-text">Copy</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-excel-o"></i>
                                        <span class="nav-text">Excel</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-text-o"></i>
                                        <span class="nav-text">CSV</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-pdf-o"></i>
                                        <span class="nav-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>New Record</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('order.order_id') !!}</th>
                            <th>{!! __('order.customer_name') !!}</th>
                            <th>{!! __('order.payable_amount') !!}</th>
                            <th>{!! __('order.payment_status') !!}</th>
                            <th>{!! __('common.status') !!}</th>
                            <th>{!! __('common.action') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $order->order_id !!}</td>
                            <td>{!! $order->user->name !!}</td>
                            <td>{!! $order->payable_amount !!}</td>
                            @if( $order->payment_status == 0 )
                                <td class="text-danger"><b>Pending</b></td>
                            @else
                                <td class="text-success"><b>Done</b></td>
                            @endif
                            @if($order->order_status == 1)
                                <td class="text-warning"><b>Pending</b></td>
                            @endif
                            <td>
                                <a href="{!! route('backend.order.details', $order->id) !!}">
                                    <i class="fas fa-border-none text-primary mr-2"></i>
                                </a>
                                <a href="javascript:;" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="{!! route('backend.order.delete', $order->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
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
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
@endsection