@extends('backend.master', ['title'=>'Country | Area | Currency'])

@section('custom_style')
<link href="{!! asset('backend/assets/css/plugin/croppie/croppie.css') !!}" rel="stylesheet" type="text/css" />
<style>
    #previewimage {
        height: 350px;
        width : 100% !important;
    }
</style>
@endsection

@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
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
                                                    <th></th>
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
                                                        <td><img src="{{ asset('uploads') }}/{{ $country->country_flag }}" style="width: 50px; height: 50px;"></td>
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
                                                            <a class="text-primary mr-2" onclick="riseCountryEditModal(
                                                                '{{ $country->id }}',
                                                                '{{ $country->name }}',
                                                                '{{ $country->two_letter_iso_code }}',
                                                                '{{ $country->three_letter_iso_code }}',
                                                                '{{ $country->country_code }}',
                                                                '{{ $country->status }}'
                                                            )">
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
                                                    <th>Country</th>
                                                    <th>{!! __('common.status') !!}</th>
                                                    <th>{!! __('common.action') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cities as $city)
                                                    <tr>

                                                        <td>{!! $city->name !!}</td>
                                                        <td>{!! $city->country->name !!}</td>
                                                        @if($city->status == 1)
                                                            <td class="text-success"><b>Active</b></td>
                                                        @else
                                                            <td class="text-danger"><b>Inactive</b></td>
                                                        @endif
                                                        <td>
                                                            <a class="text-primary mr-2" onclick="riseCityEditModal(
                                                            '{{ $city->id }}',
                                                            '{{ $city->name }}',
                                                            '{{ $city->country->id }}',
                                                            '{{ $city->status }}'
                                                            )">
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
                <!-- Currency -->
                <div class="col-sm-12 col-md-6">
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
                                                    <th>Country</th>
                                                    <th>{!! __('common.status') !!}</th>
                                                    <th>{!! __('common.action') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($currencies as $currency)
                                                    <tr>
                                                        <td>{!! $currency->name !!}</td>
                                                        <td>{!! $currency->country->name !!}</td>
                                                        @if($currency->status == 1)
                                                            <td class="text-success"><b>Active</b></td>
                                                        @else
                                                            <td class="text-danger"><b>Inactive</b></td>
                                                        @endif
                                                        <td>
                                                            <a class="text-primary mr-2" onclick="riseCurrencyEditModal(
                                                            '{{ $currency->id }}',
                                                            '{{ $currency->name }}',
                                                            '{{ $currency->country->id }}',
                                                            '{{ $currency->status }}',
                                                            )">
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
    @include('backend.inc.modals.country_add')
    @include('backend.inc.modals.country_edit')
    @include('backend.inc.modals.city_add')
    @include('backend.inc.modals.city_edit')
    @include('backend.inc.modals.currency_add')
    @include('backend.inc.modals.currency_edit')
@endsection

@section('custom_script')
<script src="{{asset('backend/assets/js/pages/features/miscellaneous/croppie.min.js')}}"></script>

<script>
    function riseCountryEditModal(country_id, country_name, two_letter_iso_code, three_letter_iso_code, country_code, status)
    {
        $("#edit_country_modal").modal();
        $("#edit_country_modal input[name='country_name']").val(country_name);
        $("#edit_country_modal input[name='two_letter_iso_code']").val(two_letter_iso_code);
        $("#edit_country_modal input[name='three_letter_iso_code']").val(three_letter_iso_code);
        $("#edit_country_modal input[name='three_letter_iso_code']").val(three_letter_iso_code);
        $("#edit_country_modal input[name='country_code']").val(country_code);
        $("#edit_country_modal input[name='country_id']").val(country_id);
    }

    function riseCityEditModal(city_id, city_name, country_id, city_status) 
    {
        $("#edit_city_modal input[name='city_id']").val(city_id);
        $("#edit_city_modal select[name='country_id']").val(country_id);
        $("#edit_city_modal input[name='city_name']").val(city_name);
        $("#edit_city_modal select[name='city_status']").val(city_status);

        $("#edit_city_modal").modal();
    }

    function riseCurrencyEditModal(currency_id, name, country_id, status) 
    {
        $("#edit_currency_modal input[name='currency_id']").val(currency_id);
        $("#edit_currency_modal select[name='country_id']").val(country_id);
        $("#edit_currency_modal input[name='currency_name']").val(name);

        $("#edit_currency_modal").modal();
    }
</script>
@endsection



