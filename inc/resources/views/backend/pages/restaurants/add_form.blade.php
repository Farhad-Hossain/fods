@extends('backend.master', ['title'=>'Edit Restaurant'])
@section('custom_style')
  <link rel="stylesheet" href="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('frontend') !!}/css/custom/add_restaurant.css">
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Card-->
        <div class="card card-custom">
            @include('backend.inc.card_header', [
                'right_text' => 'Restaurant Add',
                'right_btn_link' => route('backend.restaurant.list'),
                'right_btn_text' => 'Restaurants',
            ])

            @include('backend.inc.form.restaurant_add', array(
              'form_action' => route('backend.restaurant.add'),
              'form_method'=>'post',
            ))
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
  <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
  <script src="{!! asset('frontend') !!}/js/custom/weekedpicker.js"></script>
@endsection
