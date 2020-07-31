@extends('backend.master', ['title'=>'Edit Restaurant'])
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
                       <select class="form-control selectpicker" data-size="7" data-live-search="true" name="country_id" required>
                         @foreach($cities as $city)
                             <option value="{!! $city->name !!}">{!! $city->name !!}</option>
                         @endforeach
                        </select>
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label>Address</label>
                       <textarea name="restaurant_address" rows="3" class="form-control" required>{!!old('restaurant_address')!!}</textarea>
                       @error('restaurant_address')
                            <p class="text-danger">{!! $message !!}</p>
                       @enderror
                   </div>
                   <div class="form-group col-sm-12 col-md-4">
                       <label></label>
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
