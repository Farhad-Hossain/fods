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
                    <h3 class="card-label">Restaurants</h3>
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
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('rest_list.name') !!}</th>
                            <th>{!! __('rest_list.owner') !!}</th>
                            <th>{!! __('rest_list.city') !!}</th>
                            <th>{!! __('rest_list.phone') !!}</th>
                            <th>{!! __('rest_list.address') !!}</th>
                            <th>{!! __('rest_list.open_status') !!}</th>
                            <th>{!! __('rest_list.delivery_charge') !!}</th>
                            <th>{!! __('rest_list.systmem_commision') !!}</th>
                            <th>{!! __('rest_list.payment_method') !!}</th>
                            <th>{!! __('rest_list.characteristics') !!}</th>
                            <th>{!! __('rest_list.action') !!}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rs as $r)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>

                            <td>{!! $r->name !!}</td>
                            <td>{!! $r->owner['name'] !!}</td>
                            <td>{!! $r->city !!}</td>
                            <td>{!! $r->phone !!}</td>
                            <td>{!! $r->address !!}</td>
                            <td>{!! ($r->open_staus==1) ? 'Open now' : 'Closed Now' !!}</td>
                            <td>{!! $r->delivery_charge !!}</td>
                            <td>{!! $r->selling_percentage !!}</td>
                            <td>{!! ($r->payment_method==1) ? 'Cash Only' : 'Card Only'  !!}</td>
                            <td>
                                @foreach($r->all_characteristics as $c)
                                    {{ $c->service_name->name }}, 
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('backend.restaurant.edit', $r->id) }}" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="{!! route('backend.restaurant.delete', $r->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
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
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
@endsection
