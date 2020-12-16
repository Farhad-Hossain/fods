<form action="{{route('backend.settings.edit_coupon_submit')}}" method="POST">
    @csrf
    <div class="row">
        <input type="hidden" name="coupon_id" value="{!! $coupon->id !!}">
        <div class="col-sm-12 col-md-4 form-group">
          <label>Area*</label>  
          <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="area_cities[]" required>
              <option value="all_city">-All Cities-</option>
              @foreach($cities as $city)
                      <option value="{{ $city->id }}" {!! in_array($city->id, $c_ctitis_arr) ? 'selected' : '' !!}>{{ $city->name }}</option>
              @endforeach
          </select>
        </div>

        @if ( \App\Helpers\Helper::admin() ) 
        <div class="col-sm-12 col-md-4 form-group">
          <label>For restaurants</label>  
          <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="restaurants[]" required>
              <option value="all_restaurants">-All Restaurants-</option>
              @foreach($restaurants as $restaurant)
                      <option value="{{ $restaurant->id }}" {!! in_array( $restaurant->id, $assigned_rest_ids ) ? 'selected' : '' !!}>{{ $restaurant->name }}</option>
              @endforeach
          </select>
        </div>
        @endif

        <div class="col-sm-12 col-md-4 form-group">
          <label>For Foods</label>  
          <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="foods[]" required>
              <option value="all_foods">-All Foods-</option>
              @foreach($foods as $food)
                      <option value="{{ $food->id }}" {!! in_array($food->id, $c_foods_arr) ? 'selected' : ''  !!} >{{ $food->food_name }}</option>
              @endforeach
          </select>
        </div>        

        <div class="col-sm-12 col-md-4 form-group">
            <label>Promo code setup*</label>
            <input type="text" name="promo_code" class="form-control" placeholder="Please enter promo code" required value="{{ $coupon->promo_code }}">
        </div>
        <div class="col-sm-12 col-md-4 form-group">
            <label>Promo type*</label>
            <select class="form-control" name="promo_type" required>
                <option value="1" {!! $coupon->promo_type == 1 ? 'selected' : '' !!}>Flat Rate</option>
                <option value="2" {!! $coupon->promo_type == 2 ? 'selected' : '' !!}>Percentage</option>
            </select>
        </div>
        
        <div class="col-sm-12 col-md-4 form-group">
            <label>Discount*</label>
            <input type="number" class="form-control" name="discount_value" placeholder="Please enter discount value" required step=".5" min="0" max="1000" value="{!! $coupon->discount_price !!}">
        </div>


        <div class="form-group col-sm-12 col-md-4">
            <label>Appliable For*</label>
            <select class="form-control" name="applicable_for" required>
                <option value="1" {!! $coupon->applicable_for == 1 ? 'selected' : '' !!}>All Users</option>
                <option value="2" {!! $coupon->applicable_for == 2 ? 'selected' : '' !!}>New Users</option>
            </select>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Promo code limit*</label>
            <input type="number" name="promo_code_limit" class="form-control" min="1" value="{!! $coupon->promo_code_limit !!}" required>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Minimum Eligible Amount*</label>
            <input type="number" name="minimum_eligible_amount" class="form-control" min="1" value="{!! $coupon->minimum_eligible_amount ?? '' !!}" required>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Maximum discount per order*</label>
            <input type="number" name="max_discount_per_order" class="form-control" min="1" value="{!! $coupon->max_discount_per_order !!}" placeholder="Maximum allowed discount for order" required>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-sm-12 col-md-4">
            <label>Promo code limit per customer</label>
            <input type="number" name="promo_code_limit_per_customer" class="form-control" min="1" max="{!! $coupon->promo_code_limit !!}" value="{!! $coupon->promo_code_limit_per_customer !!}">
        </div>
        
        <div class="form-group col-sm-12 col-md-4">
            <label>Promo percentage maximum discount*</label>
            <input type="number" name="promo_percentage_max_discount" class="form-control" value="{!! $coupon->promo_percentage_maximum_discount !!}">
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Valid for</label>
            <div class="radio-inline">
              <label class="radio">
              <input type="radio" name="valid_time" value="1" {{ $coupon->valid_time == 1 ? 'checked' : '' }} />Always
              <span></span></label>
              <label class="radio">
              <input type="radio" name="valid_time" value="2" {{ $coupon->valid_time == 2 ? 'checked' : '' }}/>Custom date
              <span></span></label>
            </div>
            @error('valid_for')
                <p class="text-info">{!! $message !!}</p>
            @enderror
        </div>

        <div class="col-sm-12 {{ $coupon->valid_time == 2 ? '' : 'd-none' }}" id="valid_date_input_form">
            <div class="row">
                <div class="form-group col-sm-12 col-md-5">
                    <label>Valid From</label>
                    <input type="date" name="valid_from" class="form-control" value="{!! $coupon->valid_date_from !!}">
                </div>
                <div class="form-group col-sm-12 col-md-5">
                    <label>Valid Till</label>
                    <input type="date" name="valid_to" class="form-control" value="{!! $coupon->valid_date_to !!}">
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <label>Description*</label>
            <textarea class="form-control" name="description" required>{!! $coupon->description !!}</textarea>
        </div>
        <br />

    </div>

    <div class="row">
      <div class="form-group col-sm-12 col-md-4 mt-2">
          <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
</form>
