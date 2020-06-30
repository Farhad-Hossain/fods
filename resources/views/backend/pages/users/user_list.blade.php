@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        @include('backend.message.emergency_form_validation')
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">{!! __('user_list.user_list') !!}</h3>
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
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>New Record</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="user_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('common.name') !!}</th>
                            <th>{!! __('common.email') !!}</th>
                            <th>{!! __('user_list.role') !!}</th>
                            <th>{!! __('common.status') !!}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        	<tr>
                        		<th>{!! $loop->iteration !!}</th>
                        		<td>{!! $user->name !!}</td>
                        		<td>{!! $user->email !!}</td>
                        		@if( $user->role == 0 )
                        			<td>System Admin</td>
                        		@elseif( $user->role == 1 )
                        			<td>Restaurant</td>
                        		@elseif( $user->role == 2 )
                        			<td>Driver</td>
                        		@elseif( $user->role == 3 )
                        			<td>Customer</td>
                        		@endif
                                <td>
                                    @if( $user->status == 1 )
                                        <b class="text-success">Active</b>
                                    @elseif( $user->status == 0 )
                                        <b class="text-danger">Inactive</b>
                                    @endif
                                </td>
                        		<td>
                                    <a href="javascript:void(0);" class="text-primary mr-2" data-toggle="modal" data-target="#edit_user_modal" onclick="set_value_and_rise_edit_modal(
                                            '{!! route("backend.users.edit", $user->id) !!}',
                                            '{!! $user->name !!}',
                                            '{!! $user->email !!}',
                                            '{!! $user->status !!}',
                                            )">
                                        <i class="far fa-edit mr-2 text-success"></i>
                                    </a>
                                    <a href="{!! route('backend.users.delete', $user->id) !!}" onclick="return confirm('Are you sure to delete this?')">
                        			    <i class="far fa-trash-alt mr-2 text-danger"></i>
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
    <!-- Edit Modal-->
    <div class="modal fade" id="edit_user_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('backend_user_list.modal_edit_title') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="" id="edit_user_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label>{!! __('backend_user_list.name') !!}</label>
                            <input type="text" class="form-control" name="name" id="name" required />
                        </div>

                        <div class="form-group">
                            <label>{!! __('backend_user_list.email') !!}</label>
                            <input type="text" name="email" class="form-control" id="email" required />
                        </div>

                        <div class="form-group">
                            <label>{!! __('backend_user_list.password') !!}</label>
                            <div class="custom-file">
                                <input type="password" name="password" class="form-control" id="password"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{!! __('common.status') !!}</label>
                            <div class="radio-inline">
                                <label class="radio radio-primary">
                                    <input type="radio" checked="" id="radio_edit_active_status" value="1" name="status" /> Active
                                    <span></span>
                                </label>
                                <label class="radio radio-success">
                                    <input type="radio" checked="" id="radio_edit_inactive_status" value="2" name="status" /> Inactive
                                    <span></span>
                                </label>
                            </div>
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
     <script src="{!! asset('backend/assets/js/customs/user_page.js') !!}"></script>
 @endsection