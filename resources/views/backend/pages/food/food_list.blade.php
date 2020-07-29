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
                    <h3 class="card-label">{!! __('backend_menus.food_list') !!}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{!! route('backend.food.add') !!}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Add Food</a>
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
                            <th>Restaurant</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Featured</th>
                            <th>{{ __('driver_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $food->food_name }}</td>
                            <td>{{ $food->restaurant->name }}</td>
                            <td>{{ $food->foodCategory->name }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->discount_price }}</td>
                            
                            @if($food->featured == 1)
                                <td><b class="text-success">Yes</b></td>
                            @else
                                <td><b class="text-danger">No</b></td>
                            @endif
                            
                            <td>
                                <a href="{{ route('backend.food.edit', $food->id) }}" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="{!! route('backend.food.delete', $food->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
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
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
@endsection
