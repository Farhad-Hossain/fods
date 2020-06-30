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
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Export</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav flex-column nav-hover">
                                <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-print"></i>
                                        <span class="nav-text">Print</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-copy"></i>
                                        <span class="nav-text">Copy</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-excel-o"></i>
                                        <span class="nav-text">Excel</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-text-o"></i>
                                        <span class="nav-text">CSV</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-pdf-o"></i>
                                        <span class="nav-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>New Record</a>
                    <!--end::Button-->
                </div>
            </div>
            <!--begin::Form-->
            <form class="form" action="{!! route('backend.restaurant.edit', $r->id) !!}" method="POST">
            @csrf
            <div class="card-body">
                        <input type="hidden" name="id" value="{!! $r->id !!}" required>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('rest.name') !!}</label>
                                <input type="text" class="form-control" name="name" value="{!! $r->name !!}" />
                                @error('name')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>{!! __('rest.city') !!}</label>
                                <input type="text" class="form-control" name="city" value="{!! $r->city !!}" />
                                @error('city')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('rest.email') !!}</label>
                                <input type="email" class="form-control" name="email" value="{!! $r->email !!}" />
                                @error('email')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            
                            <div class="col-lg-6">
                                <label>{!! __('rest.phone') !!}</label>
                                <input type="text" class="form-control" name="phone" value="{!! $r->phone !!}" />
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('rest.delivery_charge') !!}</label>
                                <input type="text" class="form-control" name="delivery_charge" value="{!! $r->delivery_charge !!}" required />
                                @error('delivery_charge')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>{!! __('rest.selling_percentage') !!}</label>
                                <input type="number" class="form-control" name="selling_percentage" value="{!! $r->selling_percentage !!}" required />
                                @error('selling_percentage')
                                    <p class="text-danger">{!! $message !!}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
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
                        </div>
                        <div class="form-group row">
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