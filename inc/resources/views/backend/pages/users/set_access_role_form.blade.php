@extends('backend.master', ['title'=>'Role manage'])
@section('custom_style')
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
                    <h3 class="card-label">Managing Access : {!! $role->role_name !!} role</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <form class="form" action="{!! route('backend.users.roles.manage_submit') !!}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="role_id" value="{!! $role->id !!}">

                    <div class="row">
                        <div class="col-sm-12"><b>Dashboard</b></div>
                        <div class="col-sm-4">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="dashboard_view" {{strpos($role_accesses, 'dashboard_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-2"><b>User Management</b></div>
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_management_s_all" {{strpos($role_accesses, 'user_management_s_all')>-1?'checked':''}} /> Select All
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_management_ds_all" {{strpos($role_accesses, 'user_management_ds_all')>-1?'checked':''}} /> Deselect All
                                <span></span>
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <b>User</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_add" {{strpos($role_accesses, 'user_add')>-1?'checked':''}}/> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_edit" {{strpos($role_accesses, 'user_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_view" {{strpos($role_accesses, 'user_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_delete" {{strpos($role_accesses, 'user_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- User role and permission -->
                        <div class="col-sm-2">
                            <b>Role and Permission</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_role_permission_add" {{strpos($role_accesses, 'user_role_permission_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_role_permission_edit" {{strpos($role_accesses, 'user_role_permission_edit')>-1?'checked':''}}/> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_role_permission_view" {{strpos($role_accesses, 'user_role_permission_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="user_role_permission_delete" {{strpos($role_accesses, 'user_role_permission_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <!-- Restaurant Manganement -->
                    <!-- Restaurant Manganement -->
                    <br />
                    <div class="row">
                        <div class="col-sm-2"><b>Restaurant Management</b></div>
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_management_s_all" {{strpos($role_accesses, 'rest_management_s_all')>-1?'checked':''}} /> Select All
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_management_ds_all" {{strpos($role_accesses, 'rest_management_ds_all')>-1?'checked':''}} /> Deselect All
                                <span></span>
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <b>Restaurant</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_add" {{strpos($role_accesses, 'rest_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_edit" {{strpos($role_accesses, 'rest_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_view" {{strpos($role_accesses, 'rest_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_delete" {{strpos($role_accesses, 'rest_delete')>-1?'checked':''}}/> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- Sales & Transaction -->
                        <div class="col-sm-2">
                            <b>Sales Transaction</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_sales_transaction_add" {{strpos($role_accesses, 'rest_sales_transaction_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_sales_transaction_edit" {{strpos($role_accesses, 'rest_sales_transaction_edit')>-1?'checked':''}}/> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_sales_transaction_view" {{strpos($role_accesses, 'rest_sales_transaction_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_sales_transaction_delete" {{strpos($role_accesses, 'rest_sales_transaction_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <!-- Payout -->
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <b>Payout</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_add" {{strpos($role_accesses, 'rest_payout_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_edit" {{strpos($role_accesses, 'rest_payout_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_view" {{strpos($role_accesses, 'rest_payout_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_delete" {{strpos($role_accesses, 'rest_payout_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <!-- Payout Request -->
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <b>Payout Request</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_request_add" {{strpos($role_accesses, 'rest_payout_request_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_request_edit" {{strpos($role_accesses, 'rest_payout_request_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_request_view" {{strpos($role_accesses, 'rest_payout_request_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_payout_request_delete" {{strpos($role_accesses, 'rest_payout_request_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <!-- Rating & Reviews -->
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <b>Rating and Reviews</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_rating_review_add" {{strpos($role_accesses, 'rest_rating_review_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_rating_review_edit" {{strpos($role_accesses, 'rest_rating_review_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_rating_review_view" {{strpos($role_accesses, 'rest_rating_review_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_rating_review_delete" {{strpos($role_accesses, 'rest_rating_review_delete')>-1?'checked':''}}/> Delete
                                <span></span>
                            </label>
                        </div>
                        <!-- Tags -->
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <b>Tags</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_tags_add" {{strpos($role_accesses, 'rest_tags_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_tags_edit" {{strpos($role_accesses, 'rest_tags_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_tags_view" {{strpos($role_accesses, 'rest_tags_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_tags_delete" {{strpos($role_accesses, 'rest_tags_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <!-- Restaurant Favourites -->
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <b>Favourites</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_favourite_add" {{strpos($role_accesses, 'rest_favourite_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_favourite_edit" {{strpos($role_accesses, 'rest_favourite_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_favourite_view" {{strpos($role_accesses, 'rest_favourite_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="rest_favourite_delete" {{strpos($role_accesses, 'rest_favourite_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <br />
                    <!-- Food Management -->
                    <!-- Food Management -->
                    <div class="row">
                        <div class="col-sm-2"><b>Food Management</b></div>
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_management_s_all" {{strpos($role_accesses, 'food_management_s_all')>-1?'checked':''}} /> Select All
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_management_ds_all" {{strpos($role_accesses, 'food_management_ds_all')>-1?'checked':''}} /> Deselect All
                                <span></span>
                            </label>
                        </div>
                        <!-- Food Category -->
                        <div class="col-sm-2">
                            <b>Food Category</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_category_add" {{strpos($role_accesses, 'food_category_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_category_edit" {{strpos($role_accesses, 'food_category_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_category_view" {{strpos($role_accesses, 'food_category_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_category_delete" {{strpos($role_accesses, 'food_category_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <!-- Food -->
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <b>Food </b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_add" {{strpos($role_accesses, 'food_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_edit" {{strpos($role_accesses, 'food_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_view" {{strpos($role_accesses, 'food_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="food_delete" {{strpos($role_accesses, 'food_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- Cuisine -->
                        <div class="col-sm-2">
                            <b>Cuisine </b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="cuisine_add" {{strpos($role_accesses, 'cuisine_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="cuisine_edit" {{strpos($role_accesses, 'cuisine_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="cuisine_view" {{strpos($role_accesses, 'cuisine_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="cuisine_delete" {{strpos($role_accesses, 'cuisine_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- Extra Food -->
                        <div class="col-sm-2">
                            <b>Extra Food </b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="extra_food_add" {{strpos($role_accesses, 'extra_food_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="extra_food_edit" {{strpos($role_accesses, 'extra_food_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="extra_food_view" {{strpos($role_accesses, 'extra_food_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="extra_food_delete" {{strpos($role_accesses, 'extra_food_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <br />
                    <!-- Order Management -->
                    <!-- Order Management -->
                    <div class="row">
                        <div class="col-sm-2"><b>Order Management</b></div>
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_management_s_all" {{strpos($role_accesses, 'order_management_s_all')>-1?'checked':''}} /> Select All
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_management_ds_all" {{strpos($role_accesses, 'order_management_ds_all')>-1?'checked':''}} /> Deselect All
                                <span></span>
                            </label>
                        </div>
                        <!-- Order -->
                        <div class="col-sm-2">
                            <b>Order</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_add" {{strpos($role_accesses, 'order_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_edit" {{strpos($role_accesses, 'order_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_view" {{strpos($role_accesses, 'order_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_delete" {{strpos($role_accesses, 'order_delete')>-1?'checked':''}}/> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- Delivery Address -->
                        <div class="col-sm-2">
                            <b>Delivery Address</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="delivery_address_add" {{strpos($role_accesses, 'delivery_address_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="delivery_address_edit" {{strpos($role_accesses, 'delivery_address_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="delivery_address_view" {{strpos($role_accesses, 'delivery_address_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="delivery_address_delete" {{strpos($role_accesses, 'delivery_address_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- Order Status -->
                        <div class="col-sm-2">
                            <b>Order status</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_status_add" {{strpos($role_accesses, 'order_status_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_status_edit" {{strpos($role_accesses, 'order_status_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_status_view" {{strpos($role_accesses, 'order_status_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="order_status_delete" {{strpos($role_accesses, 'order_status_delete')>-1?'checked':''}}/> Delete
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <br />
                    <!-- Driver Management -->
                    <!-- Driver Management -->
                    <div class="row">
                        <div class="col-sm-2"><b>Driver Management</b></div>
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_management_s_all" {{strpos($role_accesses, 'driver_management_s_all')>-1?'checked':''}} /> Select All
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_management_ds_all" {{strpos($role_accesses, 'driver_management_ds_all')>-1?'checked':''}} /> Deselect All
                                <span></span>
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <b>Driver</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_add" {{strpos($role_accesses, 'driver_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_edit" {{strpos($role_accesses, 'driver_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_view" {{strpos($role_accesses, 'driver_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_delete" {{strpos($role_accesses, 'driver_delete')>-1?'checked':''}}/> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- Sales Transaction -->
                        <div class="col-sm-2">
                            <b>Sales Transaction</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_sales_transaction_add" {{strpos($role_accesses, 'driver_sales_transaction_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_sales_transaction_edit" {{strpos($role_accesses, 'driver_sales_transaction_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_sales_transaction_view" {{strpos($role_accesses, 'driver_sales_transaction_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_sales_transaction_delete" {{strpos($role_accesses, 'driver_sales_transaction_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-6"></div>
                        <!-- Withdrawal -->
                        <div class="col-sm-2">
                            <b>Withdrawal</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_withdrawal_add" {{strpos($role_accesses, 'driver_withdrawal_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_withdrawal_edit" {{strpos($role_accesses, 'driver_withdrawal_edit')>-1?'checked':''}}/> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_withdrawal_view" {{strpos($role_accesses, 'driver_withdrawal_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="driver_withdrawal_delete" {{strpos($role_accesses, 'driver_withdrawal_delete')>-1?'checked':''}}  /> Delete
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <br />
                    <!-- Customer Management -->
                    <!-- Customer Management -->
                    <div class="row">
                        <div class="col-sm-2"><b>Customer Management</b></div>
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_management_s_all" {{strpos($role_accesses, 'customer_management_s_all')>-1?'checked':''}} /> Select All
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_management_ds_all" {{strpos($role_accesses, 'customer_management_ds_all')>-1?'checked':''}} /> Deselect All
                                <span></span>
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <b>Customer</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_add" {{strpos($role_accesses, 'customer_add')>-1?'checked':''}}  /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_edit" {{strpos($role_accesses, 'customer_edit')>-1?'checked':''}}  /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_view" {{strpos($role_accesses, 'customer_view')>-1?'checked':''}}  /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_delete" {{strpos($role_accesses, 'customer_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                        <!-- Sales Transaction -->
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <b>Sales Transaction</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_sales_transaction_add" {{strpos($role_accesses, 'customer_sales_transaction_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_sales_transaction_edit" {{strpos($role_accesses, 'customer_sales_transaction_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_sales_transaction_view" {{strpos($role_accesses, 'customer_sales_transaction_view')>-1?'checked':''}}/> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="customer_sales_transaction_delete" {{strpos($role_accesses, 'customer_sales_transaction_delete')>-1?'checked':''}}/> Delete
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <br />
                    <!-- Discount -->
                    <!-- Discount -->
                    <div class="row">
                        <div class="col-sm-2"><b>Discount Management</b></div>
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="discount_management_s_all" {{strpos($role_accesses, 'discount_management_s_all')>-1?'checked':''}} /> Select All
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="discount_management_ds_all" {{strpos($role_accesses, 'discount_management_ds_all')>-1?'checked':''}} /> Deselect All
                                <span></span>
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <b>Discount</b>
                            <span></span>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="discount_add" {{strpos($role_accesses, 'discount_add')>-1?'checked':''}} /> Add
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="discount_edit" {{strpos($role_accesses, 'discount_edit')>-1?'checked':''}} /> Edit
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="discount_view" {{strpos($role_accesses, 'discount_view')>-1?'checked':''}} /> View
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-1">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="discount_delete" {{strpos($role_accesses, 'discount_delete')>-1?'checked':''}} /> Delete
                                <span></span>
                            </label>
                        </div>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                        <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
                            Cancel
                        </a>
                    </div>
                <!--end::Form-->
                </form>
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script type="text/javascript" src="{{asset('backend/assets/js/customs/')}}/role_manage.js"></script>
@endsection
