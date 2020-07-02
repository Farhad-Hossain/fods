@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css') !!}">
    <style type="text/css">
        #time_table tr td{
            vertical-align: middle;
        }
        .wickedpicker__controls {
            padding: 0;
            margin: 0;
        }
    </style>
@endsection

@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">{!! __('delivery.driver_registration') !!}</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('backend.delivery.driver-register') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Name</label>
                           <input type="text" class="form-control"  placeholder="Driver Name" name="name" value="{{ old('name') }}" required />
                           @error('name')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>City</label>
                           <input type="text" class="form-control"  placeholder="living city" name="city" value="{{ old('city') }}" required />
                           @error('city')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Email Adress</label>
                           <input type="email" class="form-control"  placeholder="john@example.com" name="email" value="{{ old('email') }}" required />
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
                             <input type="text" class="form-control"  placeholder="Phone number" name="phone" value="{{ old('phone') }}" required />
                           </div>
                           @error('phone')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Password</label>
                           <input type="password" class="form-control"  placeholder="" name="password" value="{{ old('password') }}" required />
                           @error('password')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Have Bike ?</label>
                           <div class="radio-inline">
                             <label class="radio">
                             <input type="radio" name="have_bike" value="1" />Yes
                             <span></span></label>
                             <label class="radio">
                             <input type="radio" name="have_bike" value="2" />Will buy Soon
                             <span></span></label>
                           </div>
                           @error('have_bike')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <!--  -->
                          <div class="form-group col-sm-12 col-md-6">
                           <label>Registered by Company*</label>
                           <div class="radio-inline">
                             <label class="radio" for="rc1">
                             <input type="radio" id="rc1" name="registered_company" value="1" />Uber
                             <span></span></label>
                             <label class="radio" for="rc2">
                             <input type="radio" id="rc2" name="registered_company" value="2" />Uala
                             <span></span></label>
                             <label class="radio" for="rc3">
                             <input type="radio" id="rc3" name="registered_company" value="3" />none
                             <span></span></label>
                           </div>
                           @error('registered_company')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <!--  -->
                          <div class="form-group col-sm-12 col-md-6">
                            <p class="h3">Working Details</p>
                           <label>Working Details*</label>
                           <div class="radio-inline">
                             <label class="radio" for="km3">
                             <input type="radio" id="km3" name="working_distance" value="3" />Working under 3 Km
                             <span></span></label>
                             <label class="radio" for="km5">
                             <input type="radio" id="km5" name="working_distance" value="5" />Working under 5 Km
                             <span></span></label>
                             <label class="radio" for="km8">
                             <input type="radio" id="km8" name="working_distance" value="8" />Working under 8 Km
                             <span></span></label>
                           </div>
                           @error('working_distance')
                             <p class="text-danger">{{ $message }}</p>
                           @enderror
                          </div>
                          <!--  -->
                           <div class="form-group col-sm-12 col-md-12">
                            <p class="h3 text-center">Timing</p>
                               
                                   <table class="table table-sm table-collapsed" id="time_table">
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
                               
                               @error('active_days')
                                   <p class="text-info">{!! $message !!}</p>
                               @enderror
                           </div>
                           <!--  -->
                           <div class="form-group col-sm-12 col-md-6">
                            <label>Earning Style*</label>
                            <div class="radio-inline">
                              <label class="radio" for="es1">
                              <input type="radio" id="es1" name="earning_style" value="1" />Every Order Commission
                              <span></span></label>
                              <label class="radio" for="es2">
                              <input type="radio" id="es2" name="earning_style" value="2" />Monthly Salary
                              <span></span></label>
                            </div>
                            @error('earning_style')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                           </div>
                         </div>
                         <div class="card-footer">
                          <button type="submit" class="btn btn-success mr-2">Register</button>
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
@section('custom_script')
    <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
    <script>
        var options = {
            twentyFour: true,  //Display 24 hour format, defaults to false
        };
        $('.timepicker').wickedpicker(options);
    </script>
@endsection