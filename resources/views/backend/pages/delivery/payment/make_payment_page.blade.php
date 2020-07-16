@extends('backend.master')
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">{!! __('order.payment') !!}</h3>
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
                        <form class="form" action="" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                               <label>Payment Type</label>
                               <input type="text" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label>Select Driver</label>
                                <select name="food_category" id="food_category" class="form-control selectpicker" required data-size="7" data-live-search="true">
                                  <option value="AK">Alaska</option>
                                  <option value="HI">Hawaii</option>
                                  <option value="CA">California</option>
                                </select>
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
                                    <tr>
                                        <td>Farhad Hossain</td>
                                        <td>1000</td>
                                        <td>Credit</td>
                                    </tr>
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
