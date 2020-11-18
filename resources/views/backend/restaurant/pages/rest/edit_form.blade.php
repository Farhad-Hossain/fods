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
                    <h3 class="card-label">Restaurant - Edit</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ route('backend.restaurant.list') }}" class="btn btn-primary font-weight-bolder">
                        Restaurant list
                    </a>
                    <!--end::Button-->
                </div>
            </div>
            <!--begin::Form-->
            <form class="form" action="{!! route('backend.restAdmin.rest.edit_submit', $r->id) !!}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                        <input type="hidden" name="id" value="{!! $r->id !!}" required>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>{!! __('rest.name') !!}</label>
                                <input type="text" class="form-control" name="name" value="{!! $r->name !!}" />
                                @error('name')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>{!! __('rest.city') !!}</label>
                                <select class="form-control selectpicker" data-size="7" data-live-search="true" name="city" required>
                                  @foreach($cities as $city)
                                      <option value="{!! $city->id !!}" {{ $city->id == $r->restCity->id ? 'selected' : '' }} >{!! $r->restCity->name !!}</option>
                                  @endforeach
                                </select>
                                @error('city')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>{!! __('rest.email') !!}</label>
                                <input type="email" class="form-control" name="email" value="{!! $r->email !!}" />
                                @error('email')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>{!! __('rest.phone') !!}</label>
                                <input type="text" class="form-control" name="phone" value="{!! $r->phone !!}" />
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label>Latitude</label>
                                <input type="text" class="form-control" name="restaurant_latitude" placeholder="Insert Latitude" value="{{ $r->latitude }}">
                                @error('restaurant_latitude')
                                     <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label>Longitude</label>
                                <input type="text" class="form-control" name="restaurant_longitude" placeholder="Insert longitute" value="{{ $r->longitute }}">
                                @error('restaurant_longitude')
                                     <p class="text-danger">{!! $message !!}</p>
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
                                    <input type="hidden" name="restaurant_logo">
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
                                    <input type="hidden" name="restaurant_photo">
                                </div> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>{!! __('rest.delivery_charge') !!}</label>
                                <input type="text" class="form-control" name="delivery_charge" value="{!! $r->delivery_charge !!}" required />
                                @error('delivery_charge')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>{!! __('rest.selling_percentage') !!}</label>
                                <input type="number" class="form-control" name="selling_percentage" value="{!! $r->selling_percentage !!}" required />
                                @error('selling_percentage')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>{!! __('rest.payment_method') !!}</label>
                                <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="payment_methods[]" required>
                                    @foreach($payment_methods as $payment_method)
                                        <option value="{{$payment_method->id}}" {{ in_array($payment_method->id, $helper_array) ? 'selected' : '' }}>{{$payment_method->method_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-lg-4">
                                <label>{!! __('rest.website') !!}</label>
                                <input type="text" name="website" class="form-control" value="{!! $r->website !!}" required>
                                @error('website')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>{!! __('rest.address') !!}</label>
                                <textarea class="form-control" name="address" required>{!! $r->address !!}</textarea>
                                @error('address')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
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
                        </div>
                        <div class="form-group row">
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
                            <div class="form-group col-sm-12 col-md-4">
                                <label>Tags</label>

                                <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="tags[]" required>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ $tag->id == $r->tagAppointed['id'] ? 'selected' : '' }}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
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
        </div>
        <!--end::Card-->
    </div>
@endsection
