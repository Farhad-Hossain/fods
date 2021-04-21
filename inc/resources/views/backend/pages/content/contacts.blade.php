@extends('backend.master', ['title'=>'Queries'])
@section('custom_style')
    <link href="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
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
                    <h3 class="card-label">Queries</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        
                    </div>
                    <!--begin::Button-->
                    <a href="{{route('backend.content.contactInfo')}}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Settings</a>
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
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Website</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quiries as $query)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$query->name}}</td>
                                <td>{{$query->email}}</td>
                                <td>{{$query->phone_number}}</td>
                                <td>{{$query->website}}</td>
                                <td>{{$query->message}}</td>
                                <td>
                                    <a href="{{route('backend.content.deleteContact', $query->id)}}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
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
    <script src="{!!asset('backend')!!}/assets/js/datatable.js"></script>
@endsection
