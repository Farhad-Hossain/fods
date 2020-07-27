@extends('backend.master')
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">{!! __('customer.payment') !!}</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p class="alert alert-danger">{{$error}}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin::Form-->
                        <div class="row">
                            @csrf
                            <div class="col-sm-12 col-md-6">
                                <form class="form" action="{!! route('backend.customer.payment_transaction') !!}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>{!! __('transaction.transaction_type') !!}</label>
                                        <select class="form-control" name="transaction_type" required>
                                            <option class="text-light" value="">Credit/Credit</option>
                                            <option value="1">Credit</option>
                                            <option value="2">Devit</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{!! __('transaction.select_customer') !!} <b class="text-info"
                                                                                            id="wallet_amount"></b></label>
                                        <select name="transaction_to_id" class="form-control selectpicker" required
                                                data-size="7" data-live-search="true">
                                            <option value="">--Select Customer--</option>
                                            @foreach($reliable_target_users as $customer)
                                                <option value="{!! $customer->user->id !!}">{!! $customer->user->name !!}
                                                    - ({!! $customer->phone_number !!})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Traqnsaction Media</label>
                                        <input type="text" name="transaction_medium" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Transaction Referance</label>
                                        <input type="text" name="transaction_referance" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Transaction Description</label>
                                        <textarea name="transaction_description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>{!! __('transaction.transaction_amount') !!}</label>
                                        <input type="number" name="transaction_amount" required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-success"
                                                onclick="return confirm('Are you confirm ??')">Make Transaction
                                        </button>
                                        <button type="reset" class="btn btn-sm btn-info">Reset</button>

                                    </div>

                                </form>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <h3>Last 5 transactions</h3>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Driver</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($last_five_transactions as $transaction)
                                        <tr>
                                            <td>{!! $transaction->to_user->name !!}</td>
                                            <td>{!! $transaction->transaction_amount !!}</td>
                                            @if( $transaction->transaction_type == 1 )
                                                <td class="text-info">
                                                    <b>Credit</b>
                                                </td>
                                            @endif
                                            @if( $transaction->transaction_type == 2 )
                                                <td class="text-info">
                                                    <b>Debit</b>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{!! asset('backend') !!}/assets/js/customs/customer_transaction_form.js"></script>
@endsection
