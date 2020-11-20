@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Card-->
        <div class="card card-custom">
            @include('backend.inc.card_header', [
                'right_text'=>'Extra Food',
                'right_btn_link'=>'javascript:;',
                'btn_modal'=>true,
                'modal_id'=>'extra_food_add_modal',
                'right_btn_text'=>'Add Extra Food',
            ])
            <div class="card-body">
                @include('backend.inc.table.extra_food')
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
                            <label>{!! __('common.restaurant') !!}</label>
                            <select name="restaurant" id="restaurant" class="form-control selectpicker" required data-size="7" data-live-search="true">
                                <option value="">Select</option>
                                @if(!empty($restaurants))
                                    @foreach($restaurants as $restaurant)
                                        <option value="{!! $restaurant->id !!}" {!! (old('restaurant') == $restaurant->id)?'selected':'' !!}>{!! $restaurant->name !!}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
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
                            <input type="number" class="form-control" name="price" required min="1" step="0.001" max="100">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">{!! __('extra_food.add') !!}</button>
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
                            <label>{!! __('common.restaurant') !!}</label>
                            <select name="restaurant" id="restaurant" class="form-control selectpicker" required data-size="7" data-live-search="true">
                                @if(!empty($restaurants))
                                    @foreach($restaurants as $restaurant)
                                        <option value="{!! $restaurant->id !!}" {!! (old('restaurant') == $restaurant->id)?'selected':'' !!}>{!! $restaurant->name !!}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
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
                            <input type="number" class="form-control" name="price" required min="0.1" step="0.001" max="100">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">{!! __('extra_food.edit_btn') !!}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/customs/extra_food_list.js"></script>
@endsection
