@extends('backend.master', ['title'=>'Global Settings'])
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Form-->
        <form action="{{ route('backend.settings.global_settings') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-sm-12 col-md-12">
                    <div class="card card-custom gutter-b example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Global Settings</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.app_name') !!}</label>
                                    <input type="text" class="form-control" placeholder="Application Name" name="app_name"
                                           required value="{!! $setting->app_name !!}"/>
                                    @error('app_name')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.contact_email') !!}</label>
                                    <input type="text" class="form-control" placeholder="Contact Email" name="contact_email"
                                           required value="{!! $setting->contact_email !!}"/>
                                    @error('app_email')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="theme_color">{!! __('backend_gs_form.theme_color') !!}</label>
                                    <select name="theme_color" id="theme_color" class="form-control" required >
                                        <option value="1" {!! ($setting->theme_color == 1)?'selected':'' !!}>Dark</option>
                                        <option value="2" {!! ($setting->theme_color == 2)?'selected':'' !!}>Light</option>
                                    </select>
                                    @error('theme_color')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.navbar_color') !!}</label>
                                    <select name="navbar_color" id="navbar_color" class="form-control" required >
                                        <option value="1" {!! ($setting->navbar_color == 1)?'selected':'' !!}>Dark</option>
                                        <option value="2" {!! ($setting->navbar_color == 2)?'selected':'' !!}>Light</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.delivery_charge') !!}</label>
                                    <input type="number" class="form-control" placeholder="Delivery Charge"
                                           name="delivery_charge" required value="{!! $setting->default_delivery_charge !!}"/>
                                    @error('delivery_charge')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.selling_charge') !!}</label>
                                    <input type="number" step="0.01" class="form-control" placeholder="Selling Charge"
                                           name="selling_charge" required value="{!! $setting->default_product_selling_percentage !!}"/>
                                    @error('selling_charge')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Tax Percenteage</label>
                                    <input type="number" step="0.01" class="form-control" placeholder="Tax Charge in percentage"
                                           name="product_tax" required value="{{ $setting->product_tax ?? '' }}"/>
                                    @error('product_tax')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="contact_address">{!! __('backend_gs_form.contact_address') !!}</label>
                                    <textarea class="form-control" name="contact_address" id="contact_address"
                                              required>{!! $setting->contact_address !!}</textarea>
                                    @error('contact_address')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.app_status') !!}</label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" name="app_status" value="1" required {!! ($setting->app_status == 1)?'checked':'' !!}/>Active
                                            <span></span></label>
                                        <label class="radio">
                                            <input type="radio" name="app_status" value="2" required {!! ($setting->app_status == 2)?'checked':'' !!}/>Disabled
                                            <span></span></label>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Website Logo</label>
                                    <img src="{{asset('uploads')}}/{{$setting->website_logo}}" style="height: 70px; width: 70px; display: block">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input upload_image" accept="image/*" placeholder="Upload Image" target="website_logo"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('website_logo')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="website_logo" value="">
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Admin Logo</label>
                                    <img src="{{asset('uploads')}}/{{$setting->admin_logo}}" style="height: 70px; width: 70px; display: block">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input upload_image" accept="image/*" placeholder="Upload Image" target="admin_logo"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('admin_logo')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="admin_logo" value="">
                                </div>


                                <div class="form-group col-sm-12 col-md-4">
                                    <img src="{{asset('uploads')}}/{{$setting->app_logo}}" style="height: 70px; width: 70px; display: block">
                                    <label>App Logo</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input upload_image" accept="image/*" placeholder="Upload Image" target="app_logo"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('app_logo')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="app_logo" value="">
                                </div>
                                
                                <div class="form-group col-sm-12 col-md-4">
                                    <img src="{{asset('uploads')}}/{{$setting->mobile_logo}}" style="height: 70px; width: 70px; display: block">
                                    <label>Mobile View Logo</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input upload_image" accept="image/*" placeholder="Upload Image" target="mobile_logo"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('mobile_logo')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="mobile_logo" value="">
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <img src="{{asset('uploads')}}/{{$setting->login_page_cover_photo}}" style="height: 70px; width: 70px; display: block">
                                    <label>Login Page Cover Photo</label>
                                    <div></div>
                                    <div class="custom-file">
                                            <input type="file" class="custom-file-input upload_image" target="login_page_cover_photo"/>
                                        <label class="custom-file-label">Choose file</label>
                                        @error('login_page_cover_photo')
                                        <span class="form-text text-warning">{{ $message }}</span>
                                        @enderror
                                        <input type="hidden" name="login_page_cover_photo">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <img src="{{asset('uploads')}}/{{$setting->address_bar_icon}}" style="height: 70px; width: 70px; display: block">
                                    <label>Icon of Adress bar</label>
                                    <div></div>
                                    <div class="custom-file">
                                            <input type="file" class="custom-file-input upload_image" target="address_bar_icon"/>
                                        <label class="custom-file-label">Choose file</label>
                                        @error('address_bar_icon')
                                        <span class="form-text text-warning">{{ $message }}</span>
                                        @enderror
                                        <input type="hidden" name="address_bar_icon" value="">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Copy Right</label>
                                    <input type="text" class="form-control" name="app_description" value="{!! $setting->short_description !!}" required>
                                    @error('app_description')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.country') !!}</label>
                                    <select class="form-control selectpicker" name="country" required data-size="7" data-live-search="true">
                                        @foreach($countries as $country)
                                            <option value="{!! $country->id !!}" {!! $country->id == $setting->country ? 'selected' : '' !!}>{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.city') !!}</label>
                                    <select class="form-control selectpicker" name="city" required data-size="7" data-live-search="true">
                                        @foreach($cities as $city)
                                            <option value="{!! $city->id !!}" {!! $city->id == $setting->city ? 'selected' : '' !!}>{!! $city->name !!}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{!! __('backend_gs_form.current_version') !!}</label>
                                    <input type="text" name="current_version" required class="form-control" value="{{ $gd['globals']->current_version }}">
                                    @error('current_version')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <p><b>Social Links</b><span class="text-danger">( Copy the link and paste )</span></p>
                                    <hr />
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" class="form-control" value="{{$gd['globals']->facebook}}" placeholder="Facebook profile/page link">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" class="form-control" value="{{$gd['globals']->twitter}}" placeholder="Twitter profile">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Instragram</label>
                                    <input type="text" name="instragram" class="form-control" value="{{$gd['globals']->instragram}}" placeholder="Instragram profile">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>LinkedIn</label>
                                    <input type="text" name="linkedin" class="form-control" value="{{$gd['globals']->linkedin}}" placeholder="Linked in profile">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" class="form-control" value="{{$gd['globals']->youtube}}" placeholder="Youtube Channel link">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>

                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
