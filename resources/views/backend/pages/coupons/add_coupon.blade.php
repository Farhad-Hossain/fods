@extends('backend.master', ['title'=>'Coupons'])
@section('custom_style')
    <link href="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        @include('backend.message.emergency_form_validation')
        <!--begin::Card-->
        <div class="card card-custom">
          @include('backend.inc.card_header', array(
            'right_text'=>'Add Coupons',
            'right_btn_text'=>'Coupons',
            'right_btn_link'=>route('backend.settings.coupons'),
          ))
            <div class="card-body">
              @include('backend.inc.form.coupon_add')
            </div>
        </div>
    </div>

@endsection

@section('custom_script')
  <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
  <script src="{!! asset('frontend') !!}/js/custom/weekedpicker.js"></script>
  <script type="text/javascript">
      $('input[type=radio][name=valid_for]').change(function() {
          if (this.value == '1') {
              $("#valid_date_input_form").removeClass('d-block');
          }
          else if (this.value == '2') {
              $("#valid_date_input_form").addClass('d-block');
          }
      });
  </script>
@endsection
