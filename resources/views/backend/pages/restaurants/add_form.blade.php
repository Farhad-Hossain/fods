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
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">Restaurant</h3>
                </div>
                <div class="card-toolbar">
                    
                </div>
            </div>
            @include('backend.forms.restaurant', array(
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
