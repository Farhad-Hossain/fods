@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Card-->
        <div class="card card-custom">
            @include('backend.inc.card_header', array(
                'right_text'=>'Rating & Review',
                'right_btn_link'=>route('backend.food.list'),
                'right_btn_text'=>'Foods',
            ))
            <div class="card-body">
                @include('backend.inc.table.food_review')
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>

    <script type="text/javascript">
        function rise_edit_modal(route, review_id, count_stars, review_content )
        {   
            $("#edit_form").attr('action', route);
            $("input[name='review_id']").val(review_id);
            $("input[name='review_count_stars']").val(count_stars);

            $("input[name='review_content']").val(review_content);
            $("#edit_review_modal").modal();
        } 
    </script>
@endsection
