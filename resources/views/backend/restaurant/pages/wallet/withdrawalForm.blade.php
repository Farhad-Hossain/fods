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
                    <h3 class="card-label">Withdraw Request</h3>
                </div>
                
            </div>
            <div class="card-body">
                <!--begin::Form-->            
                <form class="form" action="{!! route('backend.restAdmin.wallet.withdrawRequestSubmit') !!}" method="POST">
                    <h2>Available Balance : {!! $availableBalance !!}</h2>
                    <div class="m-2 p-2"></div>
                      @csrf
                        <div class="form-group">
                            <label class="text-danger">Withdrawal Amount (Minimum Amount 50)</label>
                            <input type="number" name="withdrawal_amount" min="50" max="{!! $availableBalance !!}" class="form-control" placeholder="Maximum {!! $availableBalance !!}">
                            @error('withdrawal_amount')
                                <p class="text-danger">{!! $message !!}</p>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success mr-2">Send Request</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            
                            <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
                                Cancel
                            </a>
                        </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection