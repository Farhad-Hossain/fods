<form action="{{route('backend.settings.add_coupon_submit')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-4 form-group">
          <label>Area*</label>  
          <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="area_cities[]" required>
              <option value="all_city">-All Cities-</option>
              @foreach($cities as $city)
                      <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
          </select>
        </div>

        @if ( \App\Helpers\Helper::admin() ) 
        <div class="col-sm-12 col-md-4 form-group">
          <label>For restaurants</label>  
          <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="restaurants[]" required>
              <option value="all_restaurants">-All Restaurants-</option>
              @foreach($restaurants as $restaurant)
                      <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
              @endforeach
          </select>
        </div>
        @endif

        <div class="col-sm-12 col-md-4 form-group">
          <label>For Foods</label>  
          <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="foods[]" required>
              <option value="all_foods">-All Foods-</option>
              @foreach($foods as $food)
                      <option value="{{ $food->id }}">{{ $food->food_name }}</option>
              @endforeach
          </select>
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


        <div class="form-group col-sm-12 col-md-4">
            <label>Appliable For*</label>
            <select class="form-control" name="applicable_for" required>
                <option value="1">All Users</option>
                <option value="2">New Users</option>
            </select>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Promo code limit*</label>
            <input type="number" name="promo_code_limit" class="form-control" min="0" max="1000" value="{{old('promo_code_limit')}}" required>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Minimum Eligible Amount*</label>
            <input type="number" name="minimum_eligible_amount" class="form-control" min="1" value="{{old('minimum_eligible_amount')}}" placeholder="Minimum Buying amount to accure coupon" required>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Maximum discount per order*</label>
            <input type="number" name="max_discount_per_order" class="form-control" min="1" value="{!! old('max_discount_per_order') !!}" placeholder="Maximum allowed discount for order" required>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-sm-12 col-md-4">
            <label>Promo code limit per customer</label>
            <input type="number" name="promo_code_limit_per_customer" class="form-control" min="0" max="1000" value="{{old('promo_code_limit_per_customer')}}">
        </div>
        
        <div class="form-group col-sm-12 col-md-4">
            <label>Maximum discount for this coupon*</label>
            <input type="number" name="promo_percentage_max_discount" class="form-control" value="{{old('promo_percentage_max_discount')}}">
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Valid for</label>
            <div class="radio-inline">
              <label class="radio">
              <input type="radio" name="valid_time" value="1" selected />Always
              <span></span></label>
              <label class="radio">
              <input type="radio" name="valid_time" value="2" />Custom date
              <span></span></label>
            </div>
            @error('valid_for')
                <p class="text-info">{!! $message !!}</p>
            @enderror
        </div>

        <div class="col-sm-12 d-none" id="valid_date_input_form">
            <div class="row">
                <div class="form-group col-sm-12 col-md-5">
                    <label>Valid From</label>
                    <input type="date" name="valid_from" class="form-control" value="{{ old('valid_from') }}">
                </div>
                <div class="form-group col-sm-12 col-md-5">
                    <label>Valid Till</label>
                    <input type="date" name="valid_to" class="form-control" value="{{ old('valid_to') }}">
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <label>Description*</label>
            <textarea class="form-control" name="description" required value="{{ old('description') }}"></textarea>
        </div>

    </div>

    <div class="row">
      <div class="form-group col-sm-12 col-md-4 mt-2">
          <button type="submit" class="btn btn-primary">Create Coupon</button>
      </div>
    </div>
</form>
