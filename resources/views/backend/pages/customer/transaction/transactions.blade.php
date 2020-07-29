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
                    <h3 class="card-label">Transaction List</h3>
                </div>
                <div class="card-toolbar">
                    
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Transaction Id</th>
                            <th>User</th>
                            <th>Transaction Amount</th>
                            <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $transaction->transaction_id !!}</td>
                            <td>{!! $transaction->user->name !!}</td>
                            <td><b>{!! $transaction->transaction_amount !!}</b></td>
                            @if($transaction->transaction_status == 'Pending')
                                <td><b class="badge badge-warning">{!! $transaction->transaction_status !!}</b></td>
                            @endif
                            @if($transaction->transaction_status == 'Paid')
                                <td><b class="badge badge-success">{!! $transaction->transaction_status !!}</b></td>
                            @endif
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
    <script src="{{asset('backend')}}/assets/js/customs/customer_transactions.js"></script>
@endsection
