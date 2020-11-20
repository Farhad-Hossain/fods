<form action="{{route('backend.settings.add_coupon_submit')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-4 form-group">
          <label>Area*</label>  
          <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="area_cities[]" required>
              @foreach($cities as $city)
                      <option value="{{ $city->id }}">{{ $city->name }}</option>
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
            <select class="form-control" name="applicable_for">
                <option value="1">All Users</option>
                <option value="2">New Users</option>
            </select>
        </div>

        <div class="form-group col-sm-12 col-md-4">
            <label>Promo code limit*</label>
            <input type="number" name="promo_code_limit" class="form-control" min="0" max="1000" value="{{old('promo_code_limit')}}">
        </div>

        
    </div>
    
    <div class="row">
        
        <div class="form-group col-sm-12 col-md-4 d-none" id="valid_date_input_form">
            <label>Valid till</label>
            <input type="date" name="valid_for_date" class="form-control" value="{{old('valid_for_date')}}">
        </div>
    </div>

    <div class="row">
        
        
        <div class="form-group col-sm-12 col-md-4">
            <label>Promo code limit per customer</label>
            <input type="number" name="promo_code_limit_per_customer" class="form-control" min="0" max="1000" value="{{old('promo_code_limit_per_customer')}}">
        </div>
        
        <div class="form-group col-sm-12 col-md-4">
            <label>Promo percentage maximum discount*</label>
            <input type="number" name="promo_percentage_max_discount" class="form-control" value="{{old('promo_percentage_max_discount')}}">
        </div>

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

        <div class="col-sm-12 col-md-4">
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
