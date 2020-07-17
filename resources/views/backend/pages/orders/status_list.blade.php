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
                    <h3 class="card-label">{!! __('order.order_status_list') !!}</h3>
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
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#order_status_add_modal"> 
                        <i class="la la-plus"></i>New Record
                    </a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('order.status_name') !!}</th>
                            <th>{!! __('order.current_state') !!}</th>
                            <th>{!! __('common.action') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statuses as $status)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $status->status_name !!}</td>
                            @if( $status->status == 1 )
                                <td><b class="text-success">Active</b></td>
                            @else
                                <td><b class="text-danger">Deactivated</b></td>
                            @endif
                            <td>
                                <a href="javascript:;" data-toggle="modal" data-target="#order_status_edit_modal" onclick="set_edit_form_value('{!! $status->status_name !!}', '{!! route("backend.order.edit_status", $status->id) !!}' )">
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
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection
@section('modals')
<!-- Modal-->
<div class="modal fade" id="order_status_edit_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="" method="POST" id="edit_form">
                @csrf
                <div class="modal-body">
                   <div class="form-group">
                    <label>Status name</label>
                    <input type="text" class="form-control" id="order_status_name" name="order_status_name" placeholder="Enter status name" required/>
                   </div>
                   <div class="form-group">
                       <label>Status</label>
                       <select class="form-control" name="status">
                           <option value="1">Active</option>
                           <option value="2">Inactive</option>
                       </select>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
    <script>
        function set_edit_form_value(name, route)
        {
            $("#edit_form").attr('action', route);

            $("#order_status_name").val(name);
        }
    </script>
@endsection