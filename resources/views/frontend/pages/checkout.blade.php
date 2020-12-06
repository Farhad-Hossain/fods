@extends('frontend.master', ['title'=>'Checkout'])

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

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
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
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
                    <div class="my-checkout">
                        <div class="table-responsive">
                            <table class="table  table-bordered">
                                <thead>
                                <tr>
                                    <td class="td-heading">Meal</td>
                                    <td class="td-heading" colspan="2">Qty</td>
                                    <td class="td-heading">Rate</td>
                                    <td class="td-heading">Price</td>
                                    <td class="td-heading">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $subTotal = 0; $rest_id = 0; ?> 
                                @if(!empty($cart_contents))
                                    @foreach($cart_contents as $content)
                                        <?php $rest_id = $content->options['restaurant_info']->id; ?>
                                        <tr>
                                            <td>
                                                <div class="checkout-thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('uploads') }}/{{ $content->options['food_info']->image1 ?? '' }}" class="img-responsive" alt="thumb" title="thumb">
                                                    </a>
                                                </div>
                                                <div class="name">
                                                    <a href="{!! route('frontend.food.details', $content->id) !!}" target="_BLANK"><h4>{!! $content->name !!}</h4></a>
                                                    <a href="{!! route('frontend.restaurant.details', $content->options['restaurant_info']->id) !!}" target="_BLANK"><p>{!! $content->options['restaurant_info']->name ?? '' !!}</p></a>
                                                    <div class="star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-content" colspan="2">{!! $content->qty !!}</td>
                                            <td class="td-content">{!! $content->price !!}</td>
                                            <td class="td-content">{!! $content->price * $content->qty !!}</td>
                                            <td><button class="remove-btn" onclick="removeContent(
                                            {!! $content->id !!}, false)">Remove</button></td>
                                        </tr>
                                        @php($subTotal += ($content->price * $content->qty))
                                    @endforeach
                                @endif
                                @if(!empty($cart_contents))
                                    @foreach($extra_contents as $content)
                                        <tr>
                                            <td>
                                                <div class="checkout-thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('uploads') }}/{{$content->options['extra_food_info']->photo ?? ''}}" class="img-responsive" alt="thumb" title="thumb">
                                                    </a>
                                                </div>
                                                <div class="name">
                                                    <a href="#"><h4>{!! $content->name !!}</h4></a>
                                                    <div class="star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <span>4.5</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-content" colspan="2">{!! $content->qty !!}</td>
                                            <td class="td-content">{!! $content->price !!}</td>
                                            <td class="td-content">{!! $content->price * $content->qty !!}</td>
                                            <td><button class="remove-btn" onclick="removeContent({!! $content->id !!}, true)">Remove</button></td>
                                        </tr>
                                        @php($subTotal += ($content->price * $content->qty))
                                    @endforeach
                                @endif
                                </tbody>
                                <tbody>
                                <tr>
                                    <td colspan="5">
                                        <h3 class="text-right">Total <ins>{!! $subTotal !!}</ins></h3>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--<div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6848.588137286094!2d75.8069355495411!3d30.878433570394723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a822f25912599%3A0xa51f780d31824240!2sShaheed+Bhagat+Singh+Nagar%2C+Ludhiana%2C+Punjab!5e0!3m2!1sen!2sin!4v1556363627043!5m2!1sen!2sin" style="border:0" allowfullscreen></iframe>
                        <div class="map-location-tooltip">
                            <div class="tooltip tooltip-main">
                                <span class="tooltip-item"></span>
                                <span class="tooltip-content">Food Location</span>
                            </div>
                            <div class="tooltip tooltip-main">
                                <span class="tooltip-item"></span>
                                <span class="tooltip-content">Your Location</span>
                            </div>
                        </div>
                    </div>--}}
                    
                    <div class="food-delivery-time">
                        <p>We will Deliver in 35 min <p>
                    </div>
                    <div class="checkout-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-checkout">
                                    <img src="images/checkout/icon-1.svg" alt="">
                                    <h4>Your Information is Safe</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis at metus vitae porta.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-checkout">
                                    <img src="images/checkout/icon-2.svg" alt="">
                                    <h4>Secure Checkout</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis at metus vitae porta.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="note">
                        <p><span>Note :</span>Order cancel in 5 minutes. Ut iaculis at metus vitae porta.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    {{--<div class="right-payment-method">
                        <h4>Payment Method</h4>
                        <div class="single-payment-method">
                            <div class="payment-method-name">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input">
                                    <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                </div>
                            </div>
                            <div class="payment-method-details" data-method="cash" style="">
                                <p>Cash on delivery (COD) available. Card/Net banking acceptance subject to device availability.</p>
                            </div>
                        </div>
                        <div class="single-payment-method">
                            <div class="payment-method-name">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input">
                                    <label class="custom-control-label" for="directbank">Credit/Debit Card</label>
                                </div>
                            </div>
                            <div class="payment-method-details" data-method="bank">
                                <form>
                                    <div class="form-group">
                                        <label for="cardNumber">Card Details</label>
                                        <input type="text" class="video-form" id="cardNumber" name="cardNumber" placeholder="Card Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="video-form" id="cardHolder" name="cardHolder" placeholder="Holder Name">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12 pm-right">
                                            <div class="form-group">
                                                <select class="selectpicker" tabindex="-98">
                                                    <option value="0">Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12 pm-left pm-right">
                                            <div class="form-group">
                                                <select class="selectpicker" tabindex="-98">
                                                    <option value="0">Year</option>
                                                    <option value="1">2019</option>
                                                    <option value="2">2020</option>
                                                    <option value="3">2021</option>
                                                    <option value="4">2022</option>
                                                    <option value="5">2023</option>
                                                    <option value="6">2024</option>
                                                    <option value="7">2025</option>
                                                    <option value="8">2026</option>
                                                    <option value="9">2027</option>
                                                    <option value="10">2028</option>
                                                    <option value="11">2029</option>
                                                    <option value="12">2030</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12 pm-left">
                                            <div class="form-group">
                                                <input type="text" class="video-form" id="cardCvv" name="cardCvv" placeholder="Cvv">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accepted-check">
                                        <div class="accpet-checkbox">
                                            <input type="checkbox" id="c101" name="cb">
                                            <label for="c101">Agree to terms and conditions</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>--}}
                    {{--<div class="right-contact-dt">
                        <h4>Confirm</h4>
                        <form>
                            <div class="form-group">
                                <div class="input-field">
                                    <input type="Email" class="confirm-form" id="emailAddress" placeholder="Email Address">
                                    <i class="far fa-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-field">
                                    <input type="tel" class="confirm-form" id="telNumber" placeholder="Phone Number">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                            </div>
                        </form>
                    </div>--}}
                    
                    <div class="your-order">
                        <h4>Your Order</h4>

                        <div class="order-d">
                            <div class="item-dt-left">
                                <span>Item Total</span>
                            </div>
                            <div class="item-dt-right">
                                <p id="total_item">{!! number_format($subTotal, 2) !!}</p>
                            </div>
                        </div>

                        <div class="order-d d-none" id="promocode_row">
                            <div class="item-dt-left">
                                <span>Discount (<a href="javascript:;" id="promocode_text"></a><span id="promocode_text_percentage"></span>)</span>
                            </div>
                            <div class="item-dt-right">
                                <p>-<span id="promocode_value"></span></p>
                            </div>          
                        </div>      

                        <div class="order-d">
                            <div class="item-dt-left">
                                <span id="taxt_value_unit">Taxes ( {!! $gd['globals']->product_tax !!}% )</span>
                            </div>
                            <div class="item-dt-right">
                                <?php $total_tax = ( $subTotal * $gd['globals']->product_tax ) / 100 ?>
                                <p id="tax_value_total">{!! $total_tax !!}</p>
                            </div>
                        </div>
                        <div class="order-d">
                            <div class="item-dt-left">
                                <span>Delivery Charges</span>
                            </div>
                            <div class="item-dt-right">
                                <p id="delivery_charge">{!! number_format($delivery_charge, 2) !!}</p>
                            </div>
                        </div>

                        <div class="promocode ">
                            <h4>Promocode</h4>
                                <input class="coupon-input" id="promocode_field" type="text" placeholder="Enter promo code">
                                <div class="subscribe-btn">
                                    <div class="s-n-btn">
                                        <?php $ajaxRoute = route('frontend.promocodes') ?>
                                        <button class="promocode-btn" onclick="calculateAndChange(
                                        '{{ $subTotal }}',
                                        '{{ ($subTotal + $delivery_charge + $total_tax) }}',
                                        '{{ $ajaxRoute }}'
                                        )">Apply</button>
                                    </div>
                                </div>
                        </div>

                        <div class="total-bill">
                            <div class="total-bill-text">
                                <h5>Total</h5>
                            </div>
                            <div class="total-bill-payment">
                                <p id="total_bill">{!! number_format(($subTotal + $delivery_charge + $total_tax), 2) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-btn">
                        <form action="{!! route('frontend.cart.submit-order') !!}" method="post">
                            @csrf
                            <input type="hidden" name="total_price" value="{!! ($subTotal + $delivery_charge + $total_tax) !!}">
                            <input type="hidden" name="restaurant_id" value="{!! $rest_id !!}">
                            <input type="hidden" name="item_total_price" value="{!! $subTotal !!}">
                            <input type="hidden" name="product_tax" value="{!! $total_tax !!}">
                            <input type="hidden" name="delivery_charge" value="{!! $delivery_charge !!}">
                            <input type="hidden" name="promocode_value" value="0">
                            <div class="">
                                <p>Your Delivery Address</p>
                                <textarea name="delivery_address" class="form-control mb-2 text-dark" required>{!! Auth::user()->customer->default_delivery_address ?? '' !!}</textarea>
                            </div>
                            <button type="submit" class="chkout-btn btn-link">Checkout Now</button>
                        </form>
                        {{--<button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="{{ url('/pay-via-ajax') }}"> Checkout Now
                        </button>--}}
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{!! asset('frontend') !!}/js/custom/checkout.js"></script>
@endsection
