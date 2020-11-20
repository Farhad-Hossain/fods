<form class="form" action="{{ $form_action }}" method="{{ $form_method }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
                <input type="hidden" name="id" value="{!! $r->id ?? '' !!}" required>
                <div class="form-group row">
                    
                    <div class="col-lg-4">
                        <label>{!! __('rest.name') !!}</label>
                        <input type="text" class="form-control" name="name" value="{!! $r->name ?? ''!!}" />
                        @error('name')
                            <p class="text-danger">{!! $message !!}</p>
                        @enderror
                    </div>

                    <div class="col-lg-4">
                        <label>{!! __('rest.city') !!}</label>
                        <select class="form-control selectpicker" data-size="7" data-live-search="true" name="city" required>
                          @foreach($cities as $city)
                            @if ( isset($r) )
                              <option value="{!! $city->id !!}" {{ $city->id == $r->restCity->id ? 'selected' : '' }} >{!! $r->restCity->name ?? '' !!}</option>
                            @else
                              <option value="{!! $city->id !!}" >{!! $city->name ?? '' !!}</option>
                            @endif
                          @endforeach
                        </select>
                        @error('city')
                            <p class="text-danger">{!! $message !!}</p>
                        @enderror
                    </div>

                    <div class="col-lg-4">
                        <label>{!! __('rest.email') !!}</label>
                        <input type="email" class="form-control" name="email" value="{!! $r->email ?? '' !!}" />
                        @error('email')
                            <p class="text-danger">{!! $message !!}</p>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>{!! __('rest.phone') !!}</label>
                        <input type="text" class="form-control" name="phone" value="{!! $r->phone ??  '' !!}" />
                    </div>

                    <div class="col-lg-4">
                        <label>{!! __('rest.delivery_charge') !!}</label>
                        <input type="text" class="form-control" name="delivery_charge" value="{!! $r->delivery_charge ?? '' !!}" required />
                        @error('delivery_charge')
                            <p class="text-danger">{!! $message !!}</p>
                        @enderror
                    </div>

                    <div class="col-lg-4">
                        <label>{!! __('rest.selling_percentage') !!}</label>
                        <input type="number" class="form-control" name="selling_percentage" value="{!! $r->selling_percentage ?? '' !!}" required />
                        @error('selling_percentage')
                            <p class="text-danger">{!! $message !!}</p>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>{!! __('rest.payment_method') !!}</label>
                        <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="payment_methods[]" required>
                            @foreach($payment_methods as $payment_method)
                                @if ( isset($r) ) 
                                <option value="{{$payment_method->id}}" {{ in_array($payment_method->id, $helper_array) ? 'selected' : '' }}>{{$payment_method->method_name}}</option>
                                @else
                                <option value="{{$payment_method->id}}" >{{$payment_method->method_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label>{!! __('rest.website') !!}</label>
                        <input type="text" name="website" class="form-control" value="{!! $r->website ?? '' !!}" required>
                        @error('website')
                            <p class="text-danger">{!! $message !!}</p>
                        @enderror
                    </div>

                    <div class="col-lg-4">
                        <label>{!! __('rest.address') !!}</label>
                        <textarea class="form-control" name="address" required>{!! $r->address ?? '' !!}</textarea>
                        @error('address')
                            <p class="text-danger">{!! $message !!}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">    

                    <div class="col-lg-4">
                        <label>{!! __('rest.status') !!}</label>
                        <div class="radio-inline">
                            <label class="radio radio-solid">
                            <input type="radio" name="open_status" value="1" {!! $r->open_status == 1 ? 'checked' : '' !!} />{!! __('rest.status_open') !!}
                            <span></span></label>
                            <label class="radio radio-solid">
                            <input type="radio" name="open_status" value="2" {!! $r->open_status == 2 ? 'checked' : '' !!} />{!! __('rest.status_close') !!}
                            <span></span></label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label>{!! __('rest.alcohol_status') !!}</label>
                        <div class="radio-inline">
                            <label class="radio radio-solid">
                            <input type="radio" name="alcohol_status" value="1" {!! $r->alcohol_status == 1 ? 'checked' : '' !!} />{!! __('common.yes') !!}
                            <span></span></label>
                            <label class="radio radio-solid">
                            <input type="radio" name="alcohol_status" value="2" {!! $r->alcohol_status == 2 ? 'checked' : '' !!}  />{!! __('common.no') !!}
                            <span></span></label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label>Seating</label>
                        
                        <div class="radio-inline">
                          <label class="radio">
                          <input type="radio" name="seating_status" {!! $r->seating_status == 1 ? 'checked' : '' !!} value="1" /> Available
                          <span></span></label>
                          <label class="radio">
                          <input type="radio" name="seating_status" {!! $r->seating_status == 2 ? 'checked' : '' !!} value="2" /> Not Available
                          <span></span></label>
                        </div>
                        @error('seating_status')
                            <p class="text-info">{!! $message !!}</p>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">

                    <div class="form-group col-sm-12 col-md-4">
                        <label>Tags</label>
                        <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="tags[]" required>
                            @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $tag->id == $r->tagAppointed['id'] ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                       <label>Cuisines</label>
                       <select name="cuisines[]" multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true">
                           <option value="">Select Cuisines</option>
                           @foreach($cuisines as $cuisine)
                               <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                           @endforeach
                       </select>
                       @error('cuiseines')
                           <p class="text-info">{!! $message !!}</p>
                       @enderror
                   </div>

                    <div class="col-lg-4"> 
                        <img src="{{asset('uploads')}}/{{$r->logo}}" style="height: 70px; width: 70px; display: block">
                        <label>Logo</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input upload_image" target="restaurant_logo"/>
                            <label class="custom-file-label">Choose file</label>
                            @error('restaurant_logo')
                            <span class="form-text text-warning">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="restaurant_logo" value="">
                        </div> 
                    </div>

                    <div class="col-lg-4">
                        <img src="{{asset('uploads')}}/{{$r->cover_photo}}" style="height: 70px; width: 70px; display: block">
                        <label>Cover Photo</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input upload_image" target="restaurant_photo"/>
                            <label class="custom-file-label">Choose file</label>
                            @error('restaurant_photo')
                            <span class="form-text text-warning">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="restaurant_photo" value="">
                        </div> 
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                       <label>Timing</label>
                       <table class="table table-sm table-collapsed" id="time_table">
                           <!-- Monday -->
                           <?php 
                               $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
                               for($i = 1; $i <= 7; $i++){ ?>
                                   <tr>
                                       <td>
                                           <input type="checkbox" id="d<?=$i?>" value="1" name="{{$days[$i-1]}}_day">
                                           <label for="d<?=$i?>"><?=$days[$i-1]?></label>
                                       </td>   
                                       <td>
                                           <input type="text" name="{{$days[$i-1]}}_time_from" class="timepicker"/>
                                       </td>
                                       <td>to</td>
                                       <td>
                                           <input type="text" name="{{$days[$i-1]}}_time_to" class="timepicker"/>
                                       </td>
                                   </tr>


                           <?php 
                               }
                           ?>
                       </table>
                    </div>

                </div>
                
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                <a href="{!! route('backend.restaurant.list') !!}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</form>
