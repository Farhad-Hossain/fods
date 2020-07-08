@extends('backend.master', ['title'=>'Global Settings'])
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Form-->
        <form action="{{ route('backend.settings.global_settings') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-sm-12 col-md-12">
                    <div class="card card-custom gutter-b example example-compact">
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
                                <input type="text" class="form-control" placeholder="Navbar Color" name="navbar_color"
                                       required value="{!! $setting->navbar_color !!}"/>
                                @error('navbar_color')
                                <span class="form-text text-warning">{{ $message }}</span>
                                @enderror
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
                                <label>{!! __('backend_gs_form.app_logo') !!}</label>
                                <div></div>
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="app_logo"/>
                                    <label class="custom-file-label">Choose file</label>
                                    @error('app_logo')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{!! __('backend_gs_form.admin_logo') !!}</label>
                                <div></div>
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="admin_logo"/>
                                    <label class="custom-file-label">Choose file</label>
                                    @error('admin_logo')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label>{!! __('backend_gs_form.mobile_logo') !!}</label>
                                <div></div>
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="mobile_logo"/>
                                    <label class="custom-file-label">Choose file</label>
                                    @error('mobile_logo')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('backend_gs_form.app_description') !!}</label>
                                <textarea class="form-control" name="app_description" required>{!! $setting->short_description !!}</textarea>
                                @error('app_description')
                                <span class="form-text text-warning">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('backend_gs_form.country') !!}</label>
                                <select class="form-control" name="country">
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
                                <select class="form-control" name="city">
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
                                <input type="number" name="current_version" step="0.01" min="1" max="100" required class="form-control" value="1.0">
                                @error('current_version')
                                <span class="form-text text-warning">{{ $message }}</span>
                                @enderror
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