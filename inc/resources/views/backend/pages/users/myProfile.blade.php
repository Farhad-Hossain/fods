@extends('backend.master')

@section('main_content')
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                        </div>
                        <div class="card-toolbar">
                                <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="">
                                <i class="la la-plus"></i>Change Password
                            </a>    
                        </div>
                    </div>
                    <!--end::Header-->
                    
                    <!--begin::Form-->
                    <form class="form" action="{{ route('backend.users.myProfileEditSubmit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mb-6">Profile Info</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Avatar</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="image-input image-input-outline" id="kt_profile_avatar">
                                        <div>
                                            @if ( Auth::user()->role == 1 )
                                                <img src="{{ asset('uploads') }}/{{ $myProfile->avatar }}" style="width: 100px; height: 100px;">
                                            @else 
                                                <img src="{{ asset('uploads') }}/{{ $myProfile->admin->photo }}" style="width: 100px; height: 100px;">
                                            @endif
                                        </div>
                                        <br />
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input upload_image" target="profile_avatar"/>
                                            <label class="custom-file-label">Choose file</label>
                                            <input type="hidden" name="profile_avatar" value="">
                                        </div> 

                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>

                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{ $myProfile->name }}" />
                                </div>
                            </div>
                            @if ( Auth::user()->role == 0 )
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Designation</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="designation" value="{{ $myProfile->admin->designation }}" />
                                    </div>
                                </div>
                            @else

                            @endif

                            <div class="form-group row">
                                @if ( Auth::user()->role == 0 )
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Phone</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="phone" value="{{ $myProfile->admin->phone }}"/>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="email" value="{{ $myProfile->email }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Password</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input type="password" class="form-control form-control-lg form-control-solid" name="password" value="{{ $myProfile->password_salt }}"/>
                                    </div>
                                </div>
                            </div>                                    
                            
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Personal Information-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!--end::Content-->
@endsection

@section('modals')
<!-- 
Change Password form
-->
<div class="modal fade" id="change_password_modal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <form action="{!! route('backend.users.changePasswordSubmit') !!}" method="POST" enctype="multipart/form-data">
        <div class="modal-body" style="height: 300px;">
                @csrf
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="current_password" required value="">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="new_password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary font-weight-bold">Change Password</button>
        </div>
        <div class="m-4"></div>
        </form>
    </div>
</div>
</div>
@endsection
