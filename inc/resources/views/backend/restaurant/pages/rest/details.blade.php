@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection
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
                    <h3 class="card-label">{!! __('order.order_list') !!}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Export</button>
                        
                    </div>
                    <!--end::Dropdown-->
                </div>
            </div>
            <div class="card-body">
                <form class="form" action="{!! route('backend.restaurant.add') !!}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-4">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="user_name" value="{{ Auth::user()->name }}" required>
                            @error('user_name')
                                 <p class="text-danger">{!! $message !!}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label>User Email</label>
                            <input type="email" class="form-control" name="user_email" value="{{ Auth::user()->email }}" required>
                            @error('user_email')
                                 <p class="text-danger">{!! $message !!}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="user_password" value="{{ Auth::user()->password_salt }}"  required>
                            @error('user_password')
                                 <p class="text-danger">{!! $message !!}</p>
                            @enderror
                        </div>
                    </div>    
                    <hr>

                       <div class="row">
                           <div class="form-group col-sm-12 col-md-8">
                               <label>Restaurant Name</label>
                               <input type="text" class="form-control" name="restaurant_name" value="{{ $restaurant->name }}" required>
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
                               <label>Logo</label>
                               <div></div>
                               <div class="custom-file">
                                   <input type="file" class="custom-file-input" name="restaurant_logo"/>
                                   <label class="custom-file-label">Choose file</label>
                                   @error('restaurant_logo')
                                   <span class="form-text text-warning">{{ $message }}</span>
                                   @enderror
                               </div> 
                           </div>

                           <div class="form-group col-sm-12 col-md-4">
                               <label>Cover Photo</label>
                               <div></div>
                               <div class="custom-file">
                                   <input type="file" class="custom-file-input" name="restaurant_photo"/>
                                   <label class="custom-file-label">Choose file</label>
                                   @error('restaurant_photo')
                                   <span class="form-text text-warning">{{ $message }}</span>
                                   @enderror
                               </div> 
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
                           
                           <div class="form-group col-sm-12 col-md-4">
                               <label>Select tag</label>

                               <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="tags[]" required>
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
                               <label>City</label>
                               <select class="form-control selectpicker" data-size="7" data-live-search="true" name="city" required>
                                 @foreach($cities as $city)
                                     <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                                 @endforeach
                                </select>
                           </div>

                           <div class="form-group col-sm-12 col-md-4">
                               <label>Commission ( In percentage )</label>
                               <input type="number" class="form-control" name="commission" step="0.01" required>
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

                       <div class="row">
                           <div class="col-lg-6">
                               <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                               <a href="{!! route('backend.restaurant.list') !!}" class="btn btn-secondary">Cancel</a>
                           </div>
                       </div>
                </form>
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    
@endsection
