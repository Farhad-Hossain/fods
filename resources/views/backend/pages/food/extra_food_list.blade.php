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
                    <h3 class="card-label">{!! __('extra_food.extra_food_list') !!}</h3>
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
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#extra_food_add_modal">
                    <i class="la la-plus"></i>{!! __('common.new_record') !!}</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="restaurant_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('common.name') }}</th>
                            <th>{{ __('common.category') }}</th>
                            <th>{{ __('common.price') }}</th>
                            <th>{{ __('common.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($extra_foods as $extra_food)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $extra_food->name }}</td>
                            @if( $extra_food->status == 1 )
                                <td><b class="text-success">Active</b></td>
                            @else
                                <td><b class="text-danger">Disabled</b></td>
                            @endif
                            <td>{{ $extra_food->price }}</td>
                            <td>
                                <a href="javascript:;" class="text-primary mr-2" onclick="arise_modal_for_edit(
                                    '{!! $extra_food->id !!}',
                                    '{!! $extra_food->name !!}',
                                    '{!! $extra_food->category !!}',
                                    '{!! $extra_food->price !!}',
                                )" data-toggle="modal" data-target="#extra_food_edit_modal">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
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
    <!-- Add modal-->
    <div class="modal fade" id="extra_food_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('extra_food.modal_title') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{!! route('backend.food.extra_food.add') !!}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label>{!! __('common.name') !!}</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{!! __('common.category') !!}</label>
                            <select class="form-control" name="category" required>
                                <option value="">-Select a category-</option>
                                <option value="1">Vegiterian</option>
                                <option value="2">Non Vegiterian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{!! __('common.price') !!}</label>
                            <input type="number" class="form-control" name="price" required min="1" max="100">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary font-weight-bold">{!! __('extra_food.add') !!}</button>
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit modal-->
    <div class="modal fade" id="extra_food_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{!! __('extra_food.edit_modal_title') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form id="edit_form" action="{!! route('backend.food.extra_food.edit') !!}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label>{!! __('common.name') !!}</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{!! __('common.category') !!}</label>
                            <select class="form-control" name="category" required>
                                <option value="">-Select a category-</option>
                                <option value="1">Vegiterian</option>
                                <option value="2">Non Vegiterian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{!! __('common.price') !!}</label>
                            <input type="number" class="form-control" name="price" required min="1" max="100">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary font-weight-bold">{!! __('extra_food.edit_btn') !!}</button>
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script type="text/javascript">
        $("#restaurant_table").dataTable();

        function arise_modal_for_edit(id, name, cat, price)
        {
            $("#edit_form input[name='id']").val(id);
            $("#edit_form input[name='name']").val(name);
            $("#edit_form select[name='category']").val(cat);
            $("#edit_form input[name='price']").val(price);
        }
    </script>
@endsection