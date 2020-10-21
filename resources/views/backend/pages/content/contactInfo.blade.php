@extends('backend.master', ['title'=>'Coupons'])
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
                    <h3 class="card-label">Contact Us Information</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        
                    </div>
                    <!--begin::Button-->
                    <a href="{{route('backend.content.allQuiries')}}" class="btn btn-primary btn-sm font-weight-bolder">
                        All Queries
                    </a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('backend.content.contactInfo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Email 1</label>
                            <input type="email" class="form-control" name="email_1" placeholder="email@example.com" value="{{$info->email_1}}">
                            @error('email_1')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Email 2</label>
                            <input type="email" class="form-control" name="email_2" placeholder="email@example.com" value="{{$info->email_2}}">
                            @error('email_2')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Phone number 1</label>
                            <input type="text" class="form-control" name="phone_1" placeholder="Contact no. 1" value="{{$info->phone_1}}">
                            @error('phone_1')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Phone number 2</label>
                            <input type="text" class="form-control" name="phone_2" placeholder="Contact no. 2" value="{{$info->phone_2}}">
                            @error('phone_2')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Support Email 1</label>
                            <input type="email" class="form-control" name="support_email_1" placeholder="email@example.com" value="{{$info->support_email_1}}">
                            @error('support_email_1')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Support Email 2</label>
                            <input type="email" class="form-control" name="support_email_2" placeholder="email@example.com" value="{{$info->support_email_2}}">
                            @error('suuport_email_2')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Location Langitute</label>
                            <input type="text" class="form-control" name="langitute" placeholder="Langitute" value="{{$info->langitute}}">
                            @error('langitute')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Latitute</label>
                            <input type="text" class="form-control" name="latitute" placeholder="Latitute" value="{{$info->latitute}}">
                            @error('latitute')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Notification Email</label>
                            <input type="email" class="form-control" name="notification_email" placeholder="email@example.com" value="{{$info->notification_email}}">
                            @error('notification_email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label>Address</label>
                            <textarea name="address" class="form-control">{{$info->address}}</textarea>
                        </div>


                        <div class="col-sm-12 col-md-12">
                            <input type="submit" class="btn btn-primary" name="" value="Save Changes">
                        </div>
                    </div>
                </form>
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
