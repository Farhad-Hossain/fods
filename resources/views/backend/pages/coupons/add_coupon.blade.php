@extends('backend.master', ['title'=>'Coupons'])
@section('custom_style')
    <link href="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        @include('backend.message.emergency_form_validation')
        <!--begin::Card-->
        <div>
            <form action="{{route('backend.settings.add_coupon_submit')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-4 form-group">
                      <label>Area*</label>  
                      <input type="text" name="area" class="form-control" required value="{{old('area')}}">
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Promo code setup*</label>
                        <input type="text" name="promo_code" class="form-control" placeholder="Please enter promo code" required value="{{old('promo_code')}}">
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Promo type*</label>
                        <select class="form-control" name="promo_type" required>
                            <option value="1">Flat Rate</option>
                            <option value="2">Percentage</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Discount*</label>
                        <input type="number" class="form-control" name="discount_value" placeholder="Please enter discount value" required step=".5" min="0" max="1000" value="{{old('discount_value')}}">
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label>Description*</label>
                        <textarea class="form-control" name="description" required value="{{old('description')}}"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-4">
                        <label>Valid for</label>
                        <div class="radio-inline">
                          <label class="radio">
                          <input type="radio" name="valid_for" value="1"/>Always
                          <span></span></label>
                          <label class="radio">
                          <input type="radio" name="valid_for" value="2" />Custom date
                          <span></span></label>
                        </div>
                        @error('valid_for')
                            <p class="text-info">{!! $message !!}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12 col-md-4 d-none" id="valid_date_input_form">
                        <label>Valid till</label>
                        <input type="date" name="valid_for_date" class="form-control" value="{{old('valid_for_date')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-4">
                        <label>Appliable For*</label>
                        <select class="form-control" name="applicable_for">
                            <option value="1">All Users</option>
                            <option value="2">New Users</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label>Promo code limit*</label>
                        <input type="number" name="promo_code_limit" class="form-control" min="0" max="1000" value="{{old('promo_code_limit')}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label>Promo code limit per customer</label>
                        <input type="number" name="promo_code_limit_per_customer" class="form-control" min="0" max="1000" value="{{old('promo_code_limit_per_customer')}}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label>Promo percentage maximum discount*</label>
                        <input type="number" name="promo_percentage_max_discount" class="form-control" value="{{old('promo_percentage_max_discount')}}">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
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
