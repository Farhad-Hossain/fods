@extends('backend.master', ['title'=>'Order Status Details'])
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
                    <!--begin::Button-->
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#order_status_add_modal"> 
                        <i class="la la-plus"></i>Add New Status
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
                                @if($status->id != 1 && $status->id != 2)
                                <a href="javascript:;" data-toggle="modal" data-target="#order_status_edit_modal" onclick="set_edit_form_value('{!! $status->status_name !!}', '{!! route("backend.order.edit_status", $status->id) !!}' )">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="javascript:;" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </a>
                                @else
                                <div class="text-danger">Not Customable</div>
                                @endif
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
<div class="modal fade" id="order_status_add_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{!! route('backend.order.create_status') !!}" method="POST" id="edit_form">
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
                    <button type="submit" class="btn btn-primary font-weight-bold">Add Status</button>
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
    <script src="{{asset('backend')}}/assets/js/customs/order_status_list.js"></script>
@endsection
