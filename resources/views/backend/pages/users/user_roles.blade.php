@extends('backend.master')

@section('main_content')
    <div class="container-fluid">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
            <div class="card card-custom gutter-b" style="width: 100%;">
                <div class="card-body">
                    <div class="mb-7">
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th role="role">#</th>
                                    <th>Role Name</th>
                                    <th>Total Users</th>
                                    <th>Role Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userRoles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role['role'] }}</td>
                                    <td>{{ $role->users()->count() }}</td>
                                    <td>{{ $role['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
@endsection
