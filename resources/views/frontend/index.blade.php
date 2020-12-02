@extends('frontend.master', ['title'=>'Home'])

@section('main_content')
    <!--banner start-->
    @include('frontend.partials._banner')
    <!--banner end-->
    <!--browse-places start-->
    <section class="browse-places">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="browse-heading">
                        <h6> Browse for </h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel browse-owl owl-theme">
                        <div class="item">
                            <div class="places">
                                <a href="{{route('frontend.restaurant.restaurantAndMore')}}">
                                    <div class="b-icon">
                                        <img src="{!! asset('frontend/images/') !!}/homepage/browse_places/02.svg" alt="">
                                    </div>
                                    <div class="b-text">
                                        Restaurant & More
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="places">
                                <a href="{{route('frontend.restaurant.restaurantAndMore')}}">
                                    <div class="b-icon">
                                        <img src="{!! asset('frontend/images/') !!}/homepage/browse_places/06.svg" alt="">
                                    </div>
                                    <div class="b-text">
                                        Newly Opened Restaurant
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--browse-places end-->
    <!--how-to-work start-->
    <section class="how-to-work">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="work-item">
                        <div class="work-img">
                            <img src="{!! asset('frontend/images/') !!}/homepage/how-to-work/img_1.svg" alt="">
                        </div>
                        <div class="work-text">
                            <h4>Choose Your Area Restaurant</h4>
                            <p>Choose Your area of restaurant and browse all of your favourite food available from there. </p>
                        </div>
                    </div>
                </div><div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="work-item">
                        <div class="work-img">
                            <img src="{!! asset('frontend/images/') !!}/homepage/how-to-work/img_2.svg" alt="">
                        </div>
                        <div class="work-text">
                            <h4>Choose Food</h4>
                            <p>See the details information of the food and place an order to get it within a moment.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="work-item">
                        <div class="work-img">
                            <img src="{!! asset('frontend/images/') !!}/homepage/how-to-work/img_3.svg" alt="">
                        </div>
                        <div class="work-text">
                            <h4>Delivery</h4>
                            <p>Food will be delivered within a little time to your door.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--how-to-work end-->
    <!--discover-new-restaurants-&-book-now start-->
    <section class="new-restaurants-book-now">
        <div class="container">
            <Div class="row">
                <div class="col-md-12">
                    <div class="new-heading">
                        <h1> New Restaurants & Foods </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="new-resto">
                        <div class="large-12 columns">
                            <div class="owl-carousel dis-owl owl-theme">
                                @foreach($restaurants as $new_restaurant)
                                    <div class="item">
                                        <a href="{{route('frontend.restaurant.details',$new_restaurant->id)}}">
                                            <img src="{{asset('uploads')}}/{{$new_restaurant->logo}}" alt="" class="new-restaurant-img">
                                        </a>
                                        <p class="text-center">{{$new_restaurant->name}}</p>
                                    </div>
                                    @if($loop->iteration == 5)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--discover-new-restaurants-&-book-now end-->
    <!--order-food-online-in-your-area start-->
    <section class="order-food-online">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="new-heading">
                        <h1> Order Food Online In Your Area </h1>
                    </div>
                    <div class="your-location">
                        <span><i class="fas fa-map-marker-alt"></i>New York</span>Change Location
                    </div>
                    <div class="all-items">
                        <div class="search col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <form>
                                <input  class="search-location" name="search" type="search" placeholder="Enter Your Location"/>
                                <div class="icon-btn">
                                    <div class="cross-icon">
                                        <i class="fas fa-crosshairs"></i>
                                    </div>
                                    <div class="s-m-btn">
                                        <button class="search-meal-btn btn-link">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($foods as $food)
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="all-meal">
                        <div class="top">
                            <a href="{!! route('frontend.food.details', $food->id) !!}"><div class="bg-gradient"></div></a>
                            <div class="top-img">
                                <img src="{!! asset('uploads') !!}/{!! $food->image1 !!}" alt="" style="width: 100%; min-height: 185px; max-height: 185px;">
                            </div>
                            <div class="logo-img">
                                <img src="{!! asset('uploads') !!}/{!! $food->restaurant->logo !!}" alt="" style="width: 70px; height: 70px;">
                            </div>
                            <div class="top-text">
                                <div class="heading"><h4><a href="{!! route('frontend.food.details', $food->id) !!}">{!! $food->food_name !!}</a></h4></div>
                                <div class="sub-heading">
                                    <h5><a href="{!! route('frontend.food.details', $food->id) !!}">{!! 
                                        substr($food->restaurant->name, 0, 8) !!}</a></h5>
                                    <p>${!! $food->price !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="bottom-text">
                                <div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Fee : ${!! $food->restaurant->delivery_charge !!}</div>
                                <div class="time"><i class="far fa-clock"></i>Delivery Time : {!! $food->restaurant->delivery_time !!} Min</div>
                                <div class="star">
                                    <?php $aux = intval( \App\Helpers\Helper::getFoodAverageRating($food->id) ) ?>
                                    @for ( $i = 0; $i < $aux; $i++ ) 
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    <span>{!! number_format( \App\Helpers\Helper::getFoodAverageRating($food->id), 1 ) !!}</span>
                                    <div class="comments"><a href="{!! route('frontend.food.details', $food->id) !!}"><i class="fas fa-comment-alt"></i>{!! $food->reviews->count() !!}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="meal-btn">
                <a href="{{route('frontend.food.allFoods')}}" class="m-btn btn-link">Show All</a>
            </div>
        </div>
    </section>
    <!--order-food-online-in-your-area end-->
    <!--offer-banners start-->
    <section class="offer-banners">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="banner">
                        <div class="ads-banner" style="background-image: url(frontend/images/homepage/offer-banners/banner-1.jpg)"></div>
                        <div class="banner-items">
                            <div class="bnnr-text">
                                <h2>Order Food Online</h2>
                                <p>Use code to get 50% off upto $5<br> on your next order.</p>
                            </div>
                            <div class="offer-button">
                                <a href="#" class="of-btn btn-link">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="banner">
                        <div class="ads-banner" style="background-image: url(frontend/images/homepage/offer-banners/banner-2.jpg)"></div>
                        <div class="banner-items">
                            <div class="bnnr-text">
                                <h2>Membership<span><i class="fas fa-long-arrow-alt-right"></i></span>Open Now</h2>
                                <p>Memberships are now open for<br> purchases.</p>
                            </div>
                            <div class="offer-button">
                                <a href="{{route('frontend.customer-register')}}" class="of-btn btn-link">Sign up Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--offer-banners end-->
    <!--quick-searches start-->
    <section class="quick-searches">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="new-heading">
                        <h1> Quick Searches </h1>
                    </div>
                    <div class="sub-title">
                        Discover Restauranrs By Type of Meal
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <div class="all-meals">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-8">
                                <div class="owl-carousel searchs-owl owl-theme">
                                    @foreach($food_categories as $category)
                                        <div class="item">
                                            <a href="{{route('frontend.food.searchByCategory',$category->id)}}">
                                                <div class="meal-icon">
                                                    <img src="{!! asset('uploads') !!}/{{$category->image}}" alt="">
                                                </div>
                                                <div class="meal-title">
                                                    {{$category->name}}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--quick-searches end-->
    <!--download-link start-->
    <section class="pocket-block-preview">
        <div class="pocket-cover-banner" style="background-image: url(frontend/images/homepage/bottom-banner.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="pocket-items">
                        <div class="new-heading">
                            <h1>{{$gd['globals']->app_name}} - in Your Pocket</h1>
                        </div>
                        <div class="line">
                            <img src="{!! asset('frontend/images/') !!}/homepage/line.svg" alt="">
                        </div>
                        <p>We’ll send you a link, open it on your phone to download the app.</p>
                        <form class="search-form">
                            <input type="text" class="send-link" placeholder="Enter your email address">
                            <button type="submit" class="pocket-btn">Send Link</button>
                        </form>
                        <div class="download-btns">
                            <a href="#"><img src="{!! asset('frontend/images/') !!}/homepage/app-store.png" alt=""></a>
                            <a href="#"><img src="{!! asset('frontend/images/') !!}/homepage/play-store.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="mobile-image">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
