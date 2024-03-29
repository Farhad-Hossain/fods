@extends('backend.master', ['title'=>'Customers'])
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
                    <h3 class="card-label">{!! __('backend_menus.customer_list') !!}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        
                    </div>
                    <!--begin::Button-->
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#add_customer_modal" >
                    <i class="la la-plus"></i>{!! __('backend_menus.add_customer') !!}</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('common.name') !!}</th>
                            <th>{!! __('common.email') !!}</th>
                            <th>{!! __('common.phone_number') !!}</th>
                            <th>Delivery Address</th>
                            <th>{!! __('common.status') !!}</th>
                            <th>{!! __('common.action') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $customer->user->name !!}</td>
                            <td>{!! $customer->user->email !!}</td>
                            <td>{!! $customer->phone_number !!}</td>
                            <td>{!! $customer->default_delivery_address ?? '' !!}</td>
                            @if( $customer->status == 1 )
                                <td><b class="text-success">Active</b></td>    
                            @else
                                <td><b class="text-danger">Disabled</b></td>    
                            @endif
                            <td>
                                <a href="javascript:;" class="text-primary mr-2" data-toggle="modal" data-target="#edit_customer_modal" onclick="set_value_and_rise_edit_modal(
                                    '{!! route("backend.customer.edit", $customer->id) !!}',
                                    '{!! $customer->user->name !!}',
                                    '{!! $customer->user->email !!}',
                                    '{!! $customer->phone_number !!}',
                                    '{!! $customer->user->password_salt !!}',
                                    '{!! $customer->default_delivery_address !!}',
                                    '{!! $customer->status !!}',
                                    '{!! $customer->city_id !!}',
                                 )">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="{!! route('backend.customer.delete', $customer->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
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
    <!-- Add Modal-->
    <div class="modal fade" id="add_customer_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('backend_menus.add_customer') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('backend.customer.add') }}" id="edit_category_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                               <label>{!! __('common.name') !!}</label>
                               <input type="text" class="form-control" name="name" placeholder="Customer Name" required />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('common.email') !!}</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Customer email" required>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('common.phone_number') !!}</label>
                                <input type="text" name="phone_number" id="phone_number" placeholder="Customer phone number" class="form-control">
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('common.password') !!}</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>City</label>
                                <select class="form-control" name="city_id" required>
                                    <option value="">Select a city</option>
                                    @foreach( $cities as $city )
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Image</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upload_image" target="image"/>
                                    <label class="custom-file-label">Choose file</label>
                                    @error('image')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                    <input type="hidden" name="image" value="">
                                </div> 
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                               <label>Delivery Address ( Where the order will be placed )</label>
                                <textarea name="default_delivery_address" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{!! __('common.close') !!}</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">{!! __('common.add') !!}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal-->
    <div class="modal fade" id="edit_customer_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('backend_menus.edit_customer') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="" id="edit_customer_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                               <label>{!! __('common.name') !!}</label>
                               <input type="text" class="form-control" name="name" required />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                               <label>{!! __('common.email') !!}</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                               <label>{!! __('common.phone_number') !!}</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control">
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>City</label>
                                <select class="form-control" name="city_id" required>
                                    <option value="">Select a city</option>
                                    @foreach( $cities as $city )
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label>Image</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upload_image" target="image"/>
                                    <label class="custom-file-label">Choose file</label>
                                    @error('image')
                                    <span class="form-text text-warning">{{ $message }}</span>
                                    @enderror
                                    <input type="hidden" name="image" value="">
                                </div> 
                            </div>


                            <div class="form-group col-sm-12 col-md-6">
                               <label>{!! __('common.password') !!}</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                               <label>Delivery Address</label>
                                <textarea name="default_delivery_address" class="form-control"></textarea>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{!! __('common.close') !!}</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">{!! __('common.save_changes') !!}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{!!asset('backend')!!}/assets/js/datatable.js"></script>
    <script src="{!! asset('backend/assets/js/customs/customer_page.js') !!}"></script>
@endsection
