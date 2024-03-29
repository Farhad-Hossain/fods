@extends('backend.master')
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Payout</h3>
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
                        <form class="form" action="{!! route('backend.restaurant.make_payment') !!}" method="POST" enctype="multipart/form-data">
                          @csrf
                             <div class="form-group">
                                 <label>Select Restaurant<b class="text-info" id="wallet_amount"></b></label>
                                <select name="transaction_to_id" class="form-control selectpicker" required data-size="7" data-live-search="true">
                                  @foreach($reliable_target_users as $restaurant)
                                    <option value="{!! $restaurant->user->id !!}">{!! $restaurant->name !!} - </option>
                                  @endforeach
                                </select>
                             </div>
                             <div class="form-group">
                               <label>Method</label>
                               <input type="text" name="transaction_medium" required class="form-control">
                             </div>
                             <div class="form-group">
                               <label>Payout Amount</label>
                               <input type="number" name="transaction_amount" required class="form-control">
                             </div>
                             
                             <div class="form-group">
                               <label>Note</label>
                               <textarea name="transaction_description" class="form-control"></textarea>
                             </div>

                             <div class="form-group">
                               <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you confirm ??')">Make Payment
                               </button>
                               <a href="{!!url()->previous()!!}" class="btn btn-sm btn-warning">Cancel</a>
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
                                        <td>{!! $transaction->user->name !!}</td>
                                        <td>{!! $transaction->transaction_amount !!}</td>
                                        @if( $transaction->credit_debit == 1 )
                                          <td class="text-info">
                                            <b>Order Complete</b>
                                          </td>
                                        @endif
                                        @if( $transaction->credit_debit == 2 )
                                          <td class="text-info">
                                            <b>Pay out</b>
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
  <script type="text/javascript">
    $("select[name='transaction_to_id']").change(function(){
      alert($(this).val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = '{!! URL::to("/backed/customer/") !!}'+$(this).val();
        $.ajax({
           type:'GET',
           url: url,

           success:function(data){
            console.log(data);
            $('wallet_amount').text(data);
        });
    });
  </script>
@endsection
