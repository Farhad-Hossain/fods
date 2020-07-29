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
                    <h3 class="card-label">Restaurant Withdrawal Transactions</h3>
                </div>
                <div class="card-toolbar">
                    <a href="{!! route('backend.restaurant.make_payment') !!}" class="btn btn-primary font-weight-bolder">
                        Make Withdrawal Transaction
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Restaurant name</th>
                            <th>Amount</th>
                            <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($reqs as $req)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $req->created_at->format('g:i a jS F Y') !!}</td>
                            <td>{!! $req->user->restaurant->name !!}</td>
                            <td>{!! $req->requested_amount !!}</td>
                            @if( $req->status == 1 ) 
                                <td><b class="text-primary">Waiting</b></td>
                            @endif
                            @if( $req->status == 2 ) 
                                <td><b class="text-success">Done</b></td>
                            @endif
                            <td>
                                <div class="dropdown dropdown-inline mr-4">
                                    <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{!! route('backend.restaurant.change_payout_request_status', $req->id) !!}" class="nav-link" onclick="return confirm('Are you sure ?')">
                                            <span class="nav-text">Make Done</span>
                                        </a>
                                    </div>
                                </div>
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
@endsection
