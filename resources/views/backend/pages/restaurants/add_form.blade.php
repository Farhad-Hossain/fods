@extends('backend.master', ['title'=>'Edit Restaurant'])
@section('custom_style')
  <link rel="stylesheet" href="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('frontend') !!}/css/custom/add_restaurant.css">
@ensection
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
                    <h3 class="card-label">Restaurant</h3>
                </div>
                <div class="card-toolbar">
                    
                </div>
            </div>
            <!--begin::Form-->
            <form class="form" action="{!! route('backend.restaurant.add') !!}" method="POST">
            @csrf
            <div class="card-body">
               <div class="row">
                   <div class="form-group col-sm-12 col-md-4">
                       <label>User Name</label>
                       <input type="text" class="form-control" name="user_name" value="{!!old('user_name')!!}" required>
                       @error('user_name')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
                   </div>

                   <div class="form-group col-sm-12 col-md-4">
                       <label>User Email</label>
                       <input type="email" class="form-control" name="user_email" value="{!!old('user_email')!!}" required>
                       @error('user_email')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
                   </div>

                   <div class="form-group col-sm-12 col-md-4">
                       <label>Password</label>
                       <input type="password" class="form-control" name="user_password" value="{!!old('user_password')!!}"  required>
                       @error('user_password')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
                   </div>
               </div>    
               <hr>
               <div class="row">
                   <div class="form-group col-sm-12 col-md-8">
                       <label>Restaurant Name</label>
                       <input type="text" class="form-control" name="restaurant_name" value="{!!old('restaurant_name')!!}" required>
                       @error('restaurant_name')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Restaurant Contact Number</label>
                       <input type="text" class="form-control" name="restaurant_phone" value="{!!old('restaurant_phone')!!}" required>
                       @error('restaurant_phone')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Website</label>
                       <input type="text" class="form-control" name="restaurant_website" value="{!!old('restaurant_website')!!}">
                       @error('restaurant_website')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>City</label>
                       <select class="form-control selectpicker" data-size="7" data-live-search="true" name="city" required>
                         @foreach($cities as $city)
                             <option value="{!! $city->name !!}">{!! $city->name !!}</option>
                         @endforeach
                        </select>
                   </div>
                   
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Open Status</label>
                       <div class="radio-inline">
                         <label class="radio">
                         <input type="radio" name="open_status" value="1" />Opened Now
                         <span></span></label>
                         <label class="radio">
                         <input type="radio" name="open_status" value="2" />Will buy Soon
                         <span></span></label>
                       </div>
                       @error('open_status')
                           <p class="text-info">{!! $message !!}</p>
                       @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">

                       <label>Alcohol</label>
                       <div class="radio-inline">
                         <label class="radio">
                         <input type="radio" name="alcohol_status" value="1" /> Available
                         <span></span></label>
                         <label class="radio">
                         <input type="radio" name="alcohol_status" value="2" /> Not Available
                         <span></span></label>
                       </div>
                       @error('alcohol_status')
                           <p class="text-info">{!! $message !!}</p>
                       @enderror
                    
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Seating</label>
                       <div class="radio-inline">
                         <label class="radio">
                         <input type="radio" name="seating_status" value="1" /> Available
                         <span></span></label>
                         <label class="radio">
                         <input type="radio" name="seating_status" value="2" /> Not Available
                         <span></span></label>
                       </div>
                       @error('seating_status')
                           <p class="text-info">{!! $message !!}</p>
                       @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Cuisine</label>
                       <select name="cuisines" class="form-control selectpicker" required data-size="7" data-live-search="true">
                           <option value="">Select Cuisine</option>
                           @foreach($cuisines as $cuisine)
                               <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                           @endforeach
                       </select>
                       @error('cuiseines')
                           <p class="text-info">{!! $message !!}</p>
                       @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <div class="checkbox-title">Services*</div>
                       <div class="filter-checkboxs">
                           @foreach($restaurant_services as $service)
                               <input type="checkbox" id="cs{{ $loop->iteration }}" name="characteristices[]" value="{{ $service->id }}">
                               <label for="cs{{ $loop->iteration }}" title="Monday">{{ $service->name }}</label>
                           @endforeach
                           @error('characteristices')
                               <p class="text-info">{!! $message !!}</p>
                           @enderror
                       </div>
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Select tag</label>
                       <select class="form-control selectpicker" required data-size="7" data-live-search="true" name="tags" required>
                           <option value="">Select Tags</option>
                           @foreach($tags as $tag)
                               <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                           @endforeach
                       </select>
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                        <label>Paayment Method</label>
                        <div class="radio-inline">
                          <label class="radio">
                          <input type="radio" name="payment_method" value="1" /> Cash Only
                          <span></span></label>
                          <label class="radio">
                          <input type="radio" name="payment_method" value="2" /> Card Only
                          <span></span></label>
                        </div>
                        @error('payment_method')
                          <p class="text-info">{!!$message!!}</p>
                        @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Address</label>
                       <textarea name="restaurant_address" rows="3" class="form-control" required>{!!old('restaurant_address')!!}</textarea>
                       @error('restaurant_address')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
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
                                          <label for="d<?=$i?>" title="Monday"><?=$days[$i-1]?></label>
                                      </td>   
                                      <td>
                                          <input type="text" name="{{$days[$i-1]}}_time_from" class="timepicker"/>

                                          {{--<select class="selectpicker" tabindex="-98" name="{{$days[$i-1]}}_time_from">
                                              <option value="12">12.00 AM</option>
                                              <option value="1">01.00 AM</option>
                                              <option value="2">02.00 AM</option>
                                              <option value="3">03.00 AM</option>
                                              <option value="4">04.00 AM</option>
                                              <option value="5">05.00 AM</option>
                                              <option value="6">06.00 AM</option>
                                              <option value="7">07.00 AM</option>
                                              <option value="8">08.00 AM</option>
                                              <option value="9">09.00 AM</option>
                                              <option value="9">10.00 AM</option>
                                              <option value="9">11.00 AM</option>
                                          </select>        --}}
                                      </td>
                                      <td>to</td>
                                      <td>
                                          <input type="text" name="{{$days[$i-1]}}_time_to" class="timepicker"/>

                                          {{--<select class="selectpicker" tabindex="-98" name="{{$days[$i-1]}}_time_to">
                                              <option value="12">12.00 PM</option>
                                              <option value="1">01.00 PM</option>
                                              <option value="2">02.00 PM</option>
                                              <option value="3">03.00 PM</option>
                                              <option value="4">04.00 PM</option>
                                              <option value="5">05.00 PM</option>
                                              <option value="6">06.00 PM</option>
                                              <option value="7">07.00 PM</option>
                                              <option value="8">08.00 PM</option>
                                              <option value="9">09.00 PM</option>
                                              <option value="9">10.00 PM</option>
                                              <option value="9">11.00 PM</option>
                                          </select>--}}
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
                        <button type="submit" class="btn btn-primary mr-2">Create Restaurant</button>
                        <a href="{!! route('backend.restaurant.list') !!}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
  <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
  <script src="{!! asset('frontend') !!}/js/custom/weekedpicker.js"></script>
@endsection
