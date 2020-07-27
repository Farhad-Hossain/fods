@extends('frontend.master')

@section('custom_style')
    <!-- Bootstrap core CSS-->
    <link href="{!! asset('frontend') !!}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{!! asset('frontend') !!}/css/style.css" rel="stylesheet">
    <link href="{!! asset('frontend') !!}/css/responsive.css" rel="stylesheet">
    <link href="{!! asset('frontend') !!}/css/mega.menu.css" rel="stylesheet">
    <link href="{!! asset('frontend') !!}/css/thumbnail.slider.css" rel="stylesheet">
    <link href="{!! asset('frontend') !!}/css/datepicker.css" rel="stylesheet">
    <link href="{!! asset('frontend') !!}/css/bootstrap-select.css" rel="stylesheet">

    <!-- Owl Carousel for this template-->
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">

    <!-- Fontawesome styles for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{!! asset('frontend') !!}/css/custom/payment_options.css">
@endsection

@section('main_content')

    @include('backend.message.flash_message')
    @include('backend.message.emergency_form_validation')

    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                        <h3>Checkout</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->
    <!--partners start-->
    <section class="all-partners">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    
                    <div class="checkout-btn">
                        <input type="hidden" id="order_id" value="{!! $order->id !!}">
                        <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="{{ route('frontend.pay-via-ajax', $order->id) }}"> Pay Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--partners end-->

@endsection
@section('custom_script')
    <script src="{!! asset('frontend') !!}/assets/owlcarousel/owl.carousel.js"></script>
    <script src="{!! asset('frontend') !!}/js/custom.js"></script>
    <script src="{!! asset('frontend') !!}/js/thumbnail.slider.js"></script>
    <script src="{!! asset('frontend') !!}/js/bootstrap-datepicker.js"></script>
    <script src="{!! asset('frontend') !!}/js/bootstrap-select.js"></script>
    <script src="{!! asset('frontend') !!}/js/custom/payment_options.js"></script>
@endsection
