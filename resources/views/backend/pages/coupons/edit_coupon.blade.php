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
        @include('backend.inc.card_header', array(
            'right_text'=>'Coupon Edit',
            'right_btn_link'=>route('backend.settings.coupons'),
            'right_btn_text'=>'Coupons',
        ))
        <div class="card-body">
            <form action="{{route('backend.settings.edit_coupon_submit')}}" method="POST">
                @csrf
                <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-4 form-group">
                      <label>Area*</label>  
                      <input type="text" name="area" class="form-control" required value="{{$coupon->area}}">
                    </div>
                    
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Promo code setup*</label>
                        <input type="text" name="promo_code" class="form-control" placeholder="Please enter promo code" required value="{{$coupon->promo_code}}">
                    </div>

                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Promo type*</label>
                        <select class="form-control" name="promo_type" required>
                            <option value="1" {{$coupon->promo_type==1?'selected':''}}>Flat Rate</option>
                            <option value="2" {{$coupon->promo_type==2?'selected':''}}>Percentage</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Discount*</label>
                        <input type="number" class="form-control" name="discount_value" placeholder="Please enter discount value" required step=".5" min="0" max="1000" value="{{$coupon->discount_price}}">
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                        <label>Appliable For*</label>
                        <select class="form-control" name="applicable_for">
                            <option value="1" {{$coupon->applicable_for==1?'selected':''}} >All Users</option>
                            <option value="2" {{$coupon->applicable_for==2?'selected':''}}>New Users</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                        <label>Promo code limit*</label>
                        <input type="number" name="promo_code_limit" class="form-control" min="0" max="1000" value="{{$coupon->promo_code_limit}}">
                    </div>

                    
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-4">
                        <label>Valid for</label>
                        <div class="radio-inline">
                          <label class="radio">
                          <input type="radio" name="valid_for" value="1" {{$coupon->valid_date?'checked':''}} />Always
                          <span></span></label>
                          <label class="radio">
                          <input type="radio" name="valid_for" value="2" {{$coupon->valid_date?'checked':''}} />Custom date
                          <span></span></label>
                        </div>
                        @error('valid_for')
                            <p class="text-info">{!! $message !!}</p>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-4 d-block" id="valid_date_input_form">
                        <label>Valid till</label>
                        <input type="date" name="valid_for_date" class="form-control" value="{{$coupon->valid_date}}">
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                        <label>Promo code limit per customer</label>
                        <input type="number" name="promo_code_limit_per_customer" class="form-control" min="0" max="1000" value="{{$coupon->promo_code_limit_per_customer}}">
                    </div>
                </div>
                <div class="row">

                    

                    <div class="form-group col-sm-12 col-md-4">
                        <label>Promo percentage maximum discount*</label>
                        <input type="number" name="promo_percentage_max_discount" class="form-control" value="{{$coupon->promo_percentage_maximum_discount}}">
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label>Description*</label>
                        <textarea class="form-control" name="description" required value="{{old('description')}}">{{$coupon->description}}</textarea>
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection

@section('custom_script')
  <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
  <script src="{!! asset('frontend') !!}/js/custom/weekedpicker.js"></script>
  <script type="text/javascript">
      $('input[type=radio][name=valid_for]').change(function() {
          if (this.value == '1') {
              $("#valid_date_input_form").removeClass('d-block');
          }
          else if (this.value == '2') {
              $("#valid_date_input_form").addClass('d-block');
          }
      });
  </script>
@endsection
