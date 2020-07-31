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
                    <h3 class="card-label">Managing Access : {!! $roles->user->name !!}</h3>
                </div>
                
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <form class="form" action="{!! route('backend.users.access_form_submit') !!}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{!! $roles->user_id !!}">
                    <div class="form-group">
                        <div class="row">
                            <label class="checkbox checkbox-outline checkbox-success col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="create_admin" {!!$roles->create_admin?'checked':''!!} /> Create Admin User
                                <span></span>
                            </label> 
                            <label class="checkbox checkbox-outline checkbox-success col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="edit_admin" {!!$roles->edit_admin?'checked':''!!} /> 
                                Edit Admin User
                                <span></span>
                            </label> 
                            <label class="checkbox checkbox-outline checkbox-success col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="create_restaurant" {!!$roles->create_restaurant?'checked':''!!} /> Create Restaurant
                                <span></span>
                            </label> 

                            <label class="checkbox checkbox-outline checkbox-success col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="edit_restaurant" {!!$roles->edit_restaurant?'checked':''!!} /> edit Restaurant
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="create_food" {!!$roles->create_food?'checked':''!!}/> Create Food
                                <span></span>
                            </label>

                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="edit_food" {!!$roles->edit_food?'checked':''!!}/> Edit Food
                                <span></span>
                            </label>

                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="create_driver" {!!$roles->create_driver?'checked':''!!}/> Create Driver
                                <span></span>
                            </label>

                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="edit_driver" {!!$roles->edit_driver?'checked':''!!} /> Edit Driver
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="see_restaurant_sales_transaction" {!!$roles->see_restaurant_sales_transaction?'checked':''!!} /> Restaurant Sales
                                <span></span>
                            </label>

                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="make_restaurant_withdrawal" {!!$roles->make_restaurant_withdrawal?'checked':''!!} /> Restaurant withdrawal
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="restaurant_rating_review" {!!$roles->restaurant_rating_review?'checked':''!!}/> Restaurant Rating Review
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="restaurant_tag" {!!$roles->restaurant_tag?'checked':''!!}/> Restaurant Tag
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="food_category" {!!$roles->food_category?'checked':''!!}/> Food category
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="user_management" {!!$roles->user_management?'checked':''!!}/> User management
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-outline checkbox-primary col-md-3 mb-2 col-sm-6">
                                <input type="checkbox" name="global_setting" {!!$roles->global_setting?'checked':''!!}/> Global Setting
                                <span></span>
                            </label>

                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                        <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
                            Cancel
                        </a>
                    </div>
                <!--end::Form-->
            </div>
                </form>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
@endsection