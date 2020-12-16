@extends('backend.master', ['title'=>'Food Category List'])
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
                    <h3 class="card-label">{!! __('backend_menus.food_category') !!}</h3>
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
                    @if ( strpos(Auth::user()->admin->role(), 'food_category_add') ) 
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#add_food_category_modal" >
                    <i class="la la-plus"></i>{!! __('backend_menus.add_food_category_btn') !!}</a>
                    <!--end::Button-->
                    @endif
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="food_category_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('common.name') !!}</th>
                            <th>{!! __('common.description') !!}</th>
                            <th>{!! __('common.status') !!}</th>
                            <!-- <th>{!! __('common.image') !!}</th> -->
                            <th>{!! __('common.action') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($food_categories as $category)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $category->name !!}</td>
                            <td>{!! $category->description !!}</td>
                            @if( $category->status == 1 )
                                <td><b class="text-success">Active</b></td>    
                            @else
                                <td><b class="text-danger">Disabled</b></td>    
                            @endif
                            
                            <!-- <td><img style="width: 100px;" src="{!! asset('uploads/category/'. $category->image) !!}" alt="{!! $category->name !!}"></td> -->
                            <td>
                                @if ( strpos( Auth::user()->admin->role(), 'food_category_edit')  ) 
                                <a href="javascript:;" class="text-primary mr-2" data-toggle="modal" data-target="#edit_food_category_modal" onclick="set_value_and_rise_edit_modal(
                                    '{!! route("backend.food.category.edit", $category->id) !!}',
                                    '{!! $category->id !!}',
                                    '{!! $category->name !!}',
                                    '{!! $category->description !!}',
                                    '{!! $category->status !!}',
                                 )">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                @endif
                                @if ( strpos( Auth::user()->admin->role(), 'food_category_delete')  ) 
                                <a href="{!! route('backend.food.category.delete', $category->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </a>
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
    <!-- Add Modal-->
    <div class="modal fade" id="add_food_category_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('backend_food_category_list.modal_add_title') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('backend.food.category.add') }}" id="add_category_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                           <label>{!! __('common.name') !!}</label>
                           <input type="text" class="form-control" name="name" required />
                        </div>

                        <div class="form-group">
                           <label>{!! __('common.description') !!}</label>
                           <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>{!! __('common.image') !!}</label>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Add category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal-->
    <div class="modal fade" id="edit_food_category_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('backend_food_category_list.modal_edit_title') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="" id="edit_category_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                           <label>{!! __('common.name') !!}</label>
                           <input type="text" class="form-control" name="name" required />
                        </div>

                        <div class="form-group">
                           <label>{!! __('common.description') !!}</label>
                           <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>{!! __('common.image') !!}</label>
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
    <script src="{!! asset('backend/assets/js/customs/food_category_page.js') !!}"></script>
@endsection
