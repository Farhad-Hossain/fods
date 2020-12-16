@extends('backend.master', ['title'=>'Edit Driver Info'])
@section('custom_style')

@endsection

@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">{!! __('delivery.driver_edit') !!}</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('backend.delivery.edit-driver') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <input type="hidden" name="user_id" value="{!! $driver->user->id !!}">
                         <div class="row">
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Name</label>
                           <input type="text" class="form-control"  placeholder="Driver Name" name="name" value="{!! $driver->user->name !!}" required />
                           @error('name')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>

                          <div class="form-group col-sm-12 col-md-6">
                              <label>Photo</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input upload_image" accept="image/*" placeholder="Upload Image" target="photo"/>
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                              @error('photo')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                              <input type="hidden" name="photo" value="">
                          </div>
                          

                          <div class="form-group col-sm-12 col-md-6">
                              <label>City</label>
                              <select class="form-control selectpicker" data-size="7" data-live-search="true" name="city" required>
                                <option value="">--Select CIty--</option>
                                @foreach($cities as $city)
                                    <option value="{!! $city->id !!}" {{$driver->driverCity->id == $city->id? 'selected':''}} >{!! $city->name !!}</option>
                                @endforeach
                               </select>
                          </div>

                          <div class="form-group col-sm-12 col-md-6">
                           <label>Email Adress</label>
                           <input type="email" class="form-control"  placeholder="john@example.com" name="email" value="{!! $driver->user->email !!}" required />
                           @error('email')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Phone</label>
                           <div class="input-group">
                             <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="flaticon2-phone"></i></span>
                             </div>
                             <input type="text" class="form-control"  placeholder="Phone number" name="phone" value="{!! $driver->phone !!}" required />
                           </div>
                           @error('phone')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Password</label>
                           <input type="password" class="form-control"  placeholder="" name="password" value="{!! $driver->user->password_salt !!}" required />
                           @error('password')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Have Bike ?</label>
                           <div class="radio-inline">
                             <label class="radio">
                             <input type="radio" name="have_bike" {!! $driver->have_bike==1?'checked':'' !!} value="1" />Yes
                             <span></span></label>
                             <label class="radio">
                             <input type="radio" name="have_bike" {!! $driver->have_bike==2?'checked':'' !!} value="2" />Will buy Soon
                             <span></span></label>
                           </div>
                           @error('have_bike')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Working Distance*</label>
                           <div class="radio-inline">
                             <label class="radio" for="km3">
                             <input type="radio" id="km3" name="working_distance" {!! $driver->max_delivery_distance == 3 ? 'checked' : '' !!} value="3" />Working under 3 Km
                             <span></span></label>
                             <label class="radio" for="km5">
                             <input type="radio" id="km5" name="working_distance" {!! $driver->max_delivery_distance == 5 ? 'checked' : '' !!} value="5" />Working under 5 Km
                             <span></span></label>
                             <label class="radio" for="km8">
                             <input type="radio" id="km8" name="working_distance" {!! $driver->max_delivery_distance == 8 ? 'checked' : '' !!} value="8" />Working under 8 Km
                             <span></span></label>
                           </div>
                           @error('working_distance')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                           <div class="form-group col-sm-12 col-md-6">
                            <label>Earning Style*</label>
                            <div class="radio-inline">
                              <label class="radio" for="es1">
                              <input type="radio" id="es1" name="earning_style" {!! $driver->earning_style == 1 ? 'checked' : '' !!} value="1" />Every Order Commission
                              <span></span></label>
                              <label class="radio" for="es2">
                              <input type="radio" id="es2" name="earning_style" {!! $driver->earning_style == 2 ? 'checked' : '' !!} value="2" />Monthly Salary
                              <span></span></label>
                            </div>
                            @error('earning_style')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                           </div>
                         </div>
                         <div class="">
                          <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                          <a href="{!! route('backend.delivery.driver-list') !!}" class="btn btn-success mr-2">Cancel</a>
                          <button type="reset" class="btn btn-secondary">Reset</button>
                         </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
