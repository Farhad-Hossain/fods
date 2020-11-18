@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection
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
                    <h3 class="card-label">Drivers</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ route('backend.delivery.driver-register') }}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Register a Driver</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>{{ __('driver_list.name') }}</th>
                            <th>{{ __('driver_list.contact') }}</th>
                            <th>{{ __('driver_list.email') }}</th>
                            <th>{{ __('delivery.max_delivery_distance') }}</th>
                            <th>{{ __('driver_list.current_status') }}</th>
                            <th>{{ __('driver_list.bike_status') }}</th>
                            <th>{{ __('driver_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($drivers as $driver)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('uploads') }}/{{ $driver->photo }}" style="width: 60px; height: 60px"></td>
                            <td>{{ $driver->user->name }}</td>
                            <td>{{ $driver->phone }}</td>
                            <td>{{ $driver->user->email }}</td>
                            <td>{{ $driver->max_delivery_distance }} Km</td>
                            @if($driver->active_status == 1)
                                <td class="text-success text-bold"><b>Online</b></td>
                            @else
                                <td class="text-danger text-bold"><b>Ofline</b></td>
                            @endif
                            @if( $driver->have_bike == 1 )
                                <td class="text-success text-bold"><b>{{ 'Yes' }}</b></td>
                            @else
                                <td class="text-success text-bold"><b>{{ 'Buy Soon' }}</b></td>
                            @endif
                            <td>
                                <a href="{!! route('backend.delivery.driver-edit', $driver->id) !!}" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="{!! route('backend.delivery.driver-delete', $driver->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete this driver ?')">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')/assets/js/datatable.js"></script>
@endsection
