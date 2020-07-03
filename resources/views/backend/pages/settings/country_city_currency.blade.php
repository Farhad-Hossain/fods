@extends('backend.master', ['title'=>'Country | Area | Currency'])
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        @error('country_name')
            <p class="alert alert-danger">{!! $message !!}</p>
        @enderror
        @error('city_name')
            <p class="alert alert-danger">{!! $message !!}</p>
        @enderror
        @error('currency_name')
            <p class="alert alert-danger">{!! $message !!}</p>
        @enderror
            <div class="row">
                @csrf
                <div class="col-sm-12 col-md-6">
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Countries</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <button class="pull-right btn btn-success" data-toggle="modal" data-target="#add_country_modal">New Record</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>{!! __('common.name') !!}</th>
                                                    <th>{!! __('ccc.two_letter_iso_code') !!}</th>
                                                    <th>{!! __('ccc.three_letter_iso_code') !!}</th>
                                                    <th>{!! __('ccc.country_code') !!}</th>
                                                    <th>{!! __('common.status') !!}</th>
                                                    <th>{!! __('common.action') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($countries as $country)
                                                    <tr>
                                                        <td>{!! $country->name !!}</td>
                                                        <td>{!! $country->two_letter_iso_code !!}</td>
                                                        <td>{!! $country->three_letter_iso_code !!}</td>
                                                        <td>{!! $country->country_code !!}</td>
                                                        @if($country->status == 1)
                                                            <td class="text-success"><b>Active</b></td>
                                                        @else
                                                            <td class="text-danger"><b>Inactive</b></td>
                                                        @endif
                                                        <td>
                                                            <a class="text-primary mr-2">
                                                                <i class="far fa-edit text-primary"></i>
                                                            </a>
                                                            <a href="{!! route('backend.settings.delete_country', $country->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                                                <i class="far fa-trash-alt text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!-- City -->
                <div class="col-sm-12 col-md-6">
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Cities</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <button class="pull-right btn btn-success" data-toggle="modal" data-target="#add_city_modal">New Record</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="tabe-responsive">
                                        <table class="table table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>{!! __('common.name') !!}</th>
                                                    <th>{!! __('common.status') !!}</th>
                                                    <th>{!! __('common.action') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cities as $city)
                                                    <tr>
                                                        <td>{!! $city->name !!}</td>
                                                        @if($city->status == 1)
                                                            <td class="text-success"><b>Active</b></td>
                                                        @else
                                                            <td class="text-danger"><b>Inactive</b></td>
                                                        @endif
                                                        <td>
                                                            <a class="text-primary mr-2">
                                                                <i class="far fa-edit text-primary"></i>
                                                            </a>
                                                            <a href="javascript:;" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                                                <i class="far fa-trash-alt text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!-- CUrrency -->
                <div class="col-sm-12 col-md-4">
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">{!! __('ccc.currency') !!}</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <button class="pull-right btn btn-success" data-toggle="modal" data-target="#add_currency_modal">New Record</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="tabe-responsive">
                                        <table class="table table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>{!! __('common.name') !!}</th>
                                                    <th>{!! __('common.status') !!}</th>
                                                    <th>{!! __('common.action') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($currencies as $currency)
                                                    <tr>
                                                        <td>{!! $currency->name !!}</td>
                                                        @if($currency->status == 1)
                                                            <td class="text-success"><b>Active</b></td>
                                                        @else
                                                            <td class="text-danger"><b>Inactive</b></td>
                                                        @endif
                                                        <td>
                                                            <a class="text-primary mr-2">
                                                                <i class="far fa-edit text-primary"></i>
                                                            </a>
                                                            <a href="javascript:;" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                                                <i class="far fa-trash-alt text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
    </div>
@endsection
@section('modals')
    <!-- Add Country Modal-->
    <div class="modal fade" id="add_country_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{!! __('ccc.add_country') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{!! route('backend.settings.add_country') !!}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label>{!! __('ccc.country_name') !!}</label>
                                <input type="text" name="country_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{!! __('ccc.two_letter_iso_code') !!}</label>
                                <input type="text" name="two_letter_iso_code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{!! __('ccc.three_letter_iso_code') !!}</label>
                                <input type="text" name="three_letter_iso_code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{!! __('ccc.country_code') !!}</label>
                                <input type="text" name="country_code" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{!! __('ccc.country_flag') !!}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" placeholder="Upload Image" name="flag_image"/>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Add Country</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add City Modal-->
    <div class="modal fade" id="add_city_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{!! __('ccc.add_city') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{!! route('backend.settings.add_city') !!}" method="POST">
                    <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label>{!! __('ccc.select_country') !!}</label>
                                <select class="form-control selectpicker" data-size="7" data-live-search="true" name="country_id" required>
                                  <option value="">Select</option>
                                  @foreach($countries as $country)
                                      <option value="{!! $country->id !!}">{!! $country->name !!}</option>
                                  @endforeach
                                 </select>
                            </div>
                            <div class="form-group">
                                <label>{!! __('ccc.city_name') !!}</label>
                                <input type="text" name="city_name" class="form-control" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Add City</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Currency Modal-->
    <div class="modal fade" id="add_currency_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{!! __('ccc.add_currency') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{!! route('backend.settings.add_currency') !!}" method="POST">
                    <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label>{!! __('ccc.select_country') !!}</label>
                                <select class="form-control" name="country_id" required>
                                    <option value="">-Select a country-</option>
                                    @foreach($countries as $country)
                                        <option value="{!! $country->id !!}">{!! $country->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{!! __('ccc.currency_name') !!}</label>
                                <input type="text" name="currency_name" class="form-control" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Add Currency</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection