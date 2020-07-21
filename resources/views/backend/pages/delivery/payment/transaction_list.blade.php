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
                    <h3 class="card-label">Driver Transactions</h3>
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
                                        <i class="nav-icon la la-file-pdf-o"></i>
                                        <span class="nav-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Transaction Id</th>
                            <th>Transaction Type</th>
                            <th>User</th>
                            <th>Transaction Amount</th>
                            <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $transaction->created_at->format('g:i a jS F Y') !!}</td>
                            <td>{!! $transaction->transaction_id !!}</td>
                            <td>{!! $transaction->order_id ? 'Order' : 'Withdraw' !!}</td>
                            <td>{!! $transaction->user->name !!}</td>
                            <td><b>{!! $transaction->transaction_amount !!}</b></td>
                            <td>
                                <a href="javascript:;" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="javascript:;" class="text-danger" onclick="return confirm('Are you sure want to delete this driver ?')">
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

@section('modals')
   
@endsection


@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
    <script type="text/javascript">
        $('.payment_status_change_btn').click(function(){
            $('input[name="payment_order_id"]').val( $(this).attr('id') );
            $('#payment_status_modal').modal();
        });
        $('.status_change_btn').click(function(){
           $('input[name="order_id"]').val( $(this).attr('oid') );
           $('#status_modal').modal(); 
        });

    </script>
@endsection