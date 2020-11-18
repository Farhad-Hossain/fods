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
                    <h3 class="card-label">User's Role Type</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    
                    <a href="javascript:;" data-toggle="modal" data-target="#admin_role_modal" class="btn btn-primary font-weight-bolder">
                        <i class="la la-plus"></i>Add User Type
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
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admin_user_roles as $role)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $role->role_name !!}</td>
                            <td>
                                <a href="javascript:;" class="text-primary mr-2">
                                    Edit
                                </a> |
                                <a href="{{ route('backend.users.roles.delete', ['role_id'=>$role->id]) }}" class="text-danger" onclick="return confirm('Sure to delete ?')">
                                    Delete
                                </a> | 
                                <a href="{{ route('backend.users.roles.manage_form', ['role_id'=>$role->id]) }}">manage</a>
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
    <div class="modal fade" id="admin_role_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cuisine_modal_title">Admin User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom">
                     <!--begin::Form-->
                     <form class="form" action="{{ route('backend.users.roles.createSubmit') }}" method="post">
                        @csrf
                      <div class="card-body">
                        <input type="hidden" name="id">
                       <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  placeholder="Role Name" name="name" required />
                       </div>
                      </div>
                      <div class="card-footer">
                       <button type="submit" class="btn btn-success mr-2">Submit</button>
                       <button type="reset" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                      </div>
                     </form>
                     <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
@endsection
