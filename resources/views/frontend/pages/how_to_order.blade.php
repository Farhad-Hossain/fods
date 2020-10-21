@extends('frontend.master',['title'=>'How to order'])
@section('main_content')
<!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>How To Orders</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">How To Orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->
    
    <!--how-to-orders start-->
    <section class="how-to-orders">         
        <div class="container">     
            <div class="row">   
                <div class="col-md-12">
                    <div class="new-heading">
                        <h1> How To Order? </h1>
                    </div>                      
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="about-text1">
                        <p>Quisque gravida maximus elit et facilisis. Aenean tellus ligula, pellentesque sit amet luctus eget, posuere eget sapien. Proin ultricies vestibulum sem non lobortis. </p>
                    </div>                      
                </div>
            </div>
            <div class="order-steps">
                <div class="row justify-content-md-center">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="order-img">
                            <div class="order-bg" style="background-image: url({{asset('frontend')}}/images/how-to-orders/order-bg.jpg)"></div>
                            <div class="order-i">
                                <div class="icon">
                                    <img src="{{asset('frontend')}}/images/how-to-orders/icon_1.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="order-text">
                            <span>Step 01</span>
                            <h4>Choose Your Area Restaurant</h4>
                            <p>Aenean at tortor nec lacus feugiat rhoncus id eu erat. Etiam ut enim et nulla tincidunt convallis eget sed quam. Morbi facilisis ante eu interdum euismod. Sed sodales nisl massa. Proin pharetra tincidunt leo vel consequat</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="order-img">
                            <div class="order-bg" style="background-image: url({{asset('frontend')}}/images/how-to-orders/order-bg.jpg)"></div>
                            <div class="order-i">
                                <div class="icon">
                                    <img src="{{asset('frontend')}}/images/how-to-orders/icon_2.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="order-text">
                            <span>Step 02</span>
                            <h4>Choose Food</h4>
                            <p>Aenean at tortor nec lacus feugiat rhoncus id eu erat. Etiam ut enim et nulla tincidunt convallis eget sed quam. Morbi facilisis ante eu interdum euismod. Sed sodales nisl massa. Proin pharetra tincidunt leo vel consequat</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="order-img">
                            <div class="order-bg" style="background-image: url({{asset('frontend')}}/images/how-to-orders/order-bg.jpg)"></div>
                            <div class="order-i">
                                <div class="icon">
                                    <img src="{{asset('frontend')}}/images/how-to-orders/icon_3.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="order-text">
                            <span>Step 03</span>
                            <h4>Pay Online or Cash</h4>
                            <p>Aenean at tortor nec lacus feugiat rhoncus id eu erat. Etiam ut enim et nulla tincidunt convallis eget sed quam. Morbi facilisis ante eu interdum euismod. Sed sodales nisl massa. Proin pharetra tincidunt leo vel consequat</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="order-img">
                            <div class="order-bg" style="background-image: url({{asset('frontend')}}/images/how-to-orders/order-bg.jpg)"></div>
                            <div class="order-i">
                                <div class="icon">
                                    <img src="{{asset('frontend')}}/images/how-to-orders/icon_4.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="order-text">
                            <span>Step 04</span>
                            <h4>Delivery or Pickup</h4>
                            <p>Aenean at tortor nec lacus feugiat rhoncus id eu erat. Etiam ut enim et nulla tincidunt convallis eget sed quam. Morbi facilisis ante eu interdum euismod. Sed sodales nisl massa. Proin pharetra tincidunt leo vel consequat</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="order-img">
                            <div class="order-bg" style="background-image: url({{asset('frontend')}}/images/how-to-orders/order-bg.jpg)"></div>
                            <div class="order-i">
                                <div class="icon">
                                    <img src="{{asset('frontend')}}/images/how-to-orders/icon_5.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="order-text">
                            <span>Step 05</span>
                            <h4>Enjoy</h4>
                            <p>Aenean at tortor nec lacus feugiat rhoncus id eu erat. Etiam ut enim et nulla tincidunt convallis eget sed quam. Morbi facilisis ante eu interdum euismod. Sed sodales nisl massa. Proin pharetra tincidunt leo vel consequat</p>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </section>
    <!--how-to-orders end-->    
    <!--partner-with-us start-->
    <section class="partner-with-us">           
        <div class="container">     
            <div class="row">   
                <div class="col-md-12">
                    <div class="new-heading">
                        <h1> Partner With Us </h1>
                    </div>                      
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="about-text1">
                        <p> Quisque gravida maximus elit et facilisis. Aenean tellus ligula, pellentesque sit amet luctus eget, posuere eget sapien. </p>
                    </div>                      
                </div>
            </div>
            <div class="partner-btns">
                <a href="{{route('frontend.add-restaurant')}}" class="m-btn btn-link">For a Restaurants</a>
                <a href="{{route('frontend.add-driver')}}" class="m-btn btn-link">For a Drivers</a>              
            </div>
        </div>
    </section>
    <!--partner-with-us end-->  
    <!--over-15000-restaurants start-->
    <section class="over-restaurants">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="restaurants-links">
                        <h1>Choose From Over {{$total_restaurants}} Restaurants</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam augue justo, euismod at purus quis, dictum iaculis lorem. Sed dictum, dolor sit amet feugiat posuere, ante arcu iaculis tortor</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="view-restaurants">
                        <a href="{{route('frontend.restaurantsAsPartner')}}" class="m-btn r-btn-link">View Restaurants</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--over-15000-restaurants end-->   
@endsection
