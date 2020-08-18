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
            <form class="form" action="{!! route('backend.restaurant.edit', $r->id) !!}" method="POST" enctype="multipart/form-data">
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
                                      <option value="{!! $city->id !!}" {{ $city->id == $r->city ? 'selected' : '' }} >{!! $r->restCity->name !!}</option>
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
                            <div class="col-lg-4">
                                <label>Logo</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="restaurant_logo"/>
                                    <label class="custom-file-label">Choose file</label>
                                    @error('restaurant_photo')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div> 
                            </div>
                            <div class="col-lg-4">
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
                                <select class="form-control" name="payment_method" required>
                                    <option value="1" {!! $r->payment_method == 1 ? 'selected' : '' !!}>Cash Only</option>
                                    <option value="2" {!! $r->payment_method == 2 ? 'selected' : '' !!}>Card Only</option>
                                    <option value="3" {!! $r->payment_method == 3 ? 'selected' : '' !!}>Both</option>
                                </select>
                                @error('selling_percentage')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
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
                                <label>Select tag</label>

                                <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="tags[]" required>
                                    <option value="">Select Tags</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
