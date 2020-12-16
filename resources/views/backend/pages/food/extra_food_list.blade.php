@extends('backend.master', ['title'=>'Extra Food List'])
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
    @include('backend.inc.modals.extra_food_add')
    @include('backend.inc.modals.extra_food_edit')
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/customs/extra_food_list.js"></script>
@endsection
