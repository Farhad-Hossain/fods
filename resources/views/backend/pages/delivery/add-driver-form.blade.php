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
        <!--begin::Card-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">Add Driver</h3>
                </div>
                
            </div>
                
                 <!--begin::Form-->
                 <form class="form" action="{{ route('backend.delivery.driver-register') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                   <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control"  placeholder="Driver Name" name="name" value="{{ old('name') }}" required />
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                   </div>
                   <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control"  placeholder="living city" name="city" value="{{ old('city') }}" required />
                    @error('city')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                   </div>
                   <div class="form-group">
                    <label>Email Adress</label>
                    <input type="email" class="form-control"  placeholder="john@example.com" name="email" value="{{ old('email') }}" required />
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                   </div>
                   <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control"  placeholder="Phone number" name="phone" value="{{ old('phone') }}" required />
                    @error('phone')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                   </div>
                   <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control"  placeholder="" name="password" value="{{ old('password') }}" required />
                    @error('password')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                   </div>
                   <div class="form-group">
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
                   <p class="h3">Timing</p>
                   <div class="form-group">
                    <label>Add Time*</label>
                    <div class="filter-checkboxs">
                        <ul>
                            <table class="table table-sm table-collapsed" id="time_table">

                                <?php 
                                    $days = ['Mon','Tue','Wed','Thu','Fri','Sut','Sun'];
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
                        </ul>
                        @error('active_days')
                            <p class="text-info">{!! $message !!}</p>
                        @enderror
                    </div>
                   </div>
                   <!--  -->
                   <p class="h3">Working Details</p>
                   <div class="form-group">
                    <label>Working Details*</label>
                    <div class="radio-inline">
                      <label class="radio" for="km3">
                      <input type="radio" id="km3" name="working_distance" value="1" />Working under 3 Km
                      <span></span></label>
                      <label class="radio" for="km5">
                      <input type="radio" id="km5" name="working_distance" value="2" />Working under 5 Km
                      <span></span></label>
                      <label class="radio" for="km8">
                      <input type="radio" id="km8" name="working_distance" value="3" />Working under 8 Km
                      <span></span></label>
                    </div>
                    @error('working_distance')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                   </div>
                   <!--  -->
                   <div class="form-group">
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
                   <!--  -->
                   <div class="form-group">
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
                  </div>
                  <div class="card-footer">
                   <button type="submit" class="btn btn-success mr-2">Register</button>
                   <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                 </form>
                 <!--end::Form-->
            </div>
        </div>
        <!--end::Card-->
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