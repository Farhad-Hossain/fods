@extends('backend.master', ['page_title'=>'Withdraw requests'])
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
                    <h3 class="card-label">Withdraw Request</h3>
                </div>
                
            </div>
            <div class="card-body">

                @if( \App\Helpers\Helper::restaurant() ) 
                <!--begin::Form-->            
                <form class="form" action="{!! route('backend.wallet.withdraw_request_submit') !!}" method="POST">
                    <h2>Available Balance : {!! ($total_credit - $total_debit) !!} | Maximum withdrawal amount : {!! ( ($total_credit-$total_debit) - $gd['globals']->wallet_blocked_amount ) !!}</h2>
                    <div class="m-2 p-2"></div>
                      @csrf
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="text-danger">Withdrawal Amount ( Minimum Amount 50)</label>
                                <input type="number" name="withdrawal_amount" min="50" max = "{!! ( ($total_credit-$total_debit) - 10 ) !!}" class="form-control" placeholder="Maximum {!! ($total_credit - $total_debit) !!}">
                                @error('withdrawal_amount')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>        

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Prefered Payment Method</label>
                                <select class="form-control" name="payment_method">
                                    <option value="Cash">Cash</option>
                                    <option value="Paypal">Paypal</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Remarks</label>
                                <textarea name="remarks" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6"></div>
                            
                        
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-success mr-2">Send Request</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
                                    Cancel
                                </a>
                            </div>
                        </div>
                </form>
                <!--end::Form-->
                @endif

                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Requested at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($withdrawalRequests as $req)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $req->payment_method }}</td>
                            <td>{{ $req->requested_amount }}</td>
                            <td>
                                @if( $req->action_status == 1 )
                                    <b class="text-info">Pending</b>
                                @elseif ( $req->action_status == 2 ) 
                                    <b class="text-success">Approved</b>
                                @else
                                    <div class="text-danger">Rejected</div>
                                @endif
                            </td>
                            <td>{!! $req->created_at !!}</td>
                            <td>
                                @if ( \App\Helpers\Helper::admin() ) 
                                    <a href="javascript:;" class="font-weight-bold"  data-toggle="modal" data-target="#edit_withdraw_request" onclick="arise_edit_modal(
                                    '{!! $req->id !!}',                                                      
                                    '{!! $req->payment_method !!}',
                                    '{!! $req->requested_amount !!}'
                                    )
                                    ">Edit</a> | 
                                    <a href="javascript:;" class="font-weight-bold" data-toggle="modal" data-target="#withdraw_request_change_status" onclick="arise_change_status_modal(
                                        {!! $req->id !!},
                                        {!! $req->action_status !!}
                                    )">Change Status</a>
                                @endif

                                @if( \App\Helpers\Helper::restaurant() && $req->action_status == 1 )
                                <a href="{!! route('backend.wallet.deleteWithdrawalRequestSubmit', $req->id) !!}" onclick="return confirm('Sure want to delete ?')" class="font-weight-bold">Delete</a>
                                @endif
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
    @include('backend.inc.modals.withdraw_request_edit')
    @include('backend.inc.modals.withdraw_request_change_status')
@endsection

@section('custom_script')
    <script type="text/javascript">
        function arise_edit_modal(r_id, payment_method, requested_amount)
        {
            $("input[name='withdraw_request_id']").val(r_id);
            $("select[name='payment_method']").val(payment_method);
            $("input[name='requested_amount']").val(requested_amount);
        }

        function arise_change_status_modal(req_id, req_action_status)
        {
            $("#withdraw_request_change_status input[name='withdraw_request_id']").val(req_id);
            $("#withdraw_request_change_status select[name='action_status_value']").val(req_action_status);
        }

    </script>
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
@endsection
