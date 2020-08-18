@extends('frontend.master', ['title'=>'Food Details'])

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
@endsection

@section('main_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--BEGIN::Title bar-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                        <h3>Food Details</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">
                        <ul>
                            <li class="breadcrumb-item"><a href="{!! route('frontend.home') !!}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Food Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END::Title bar-->
    <!--meal-detail-start-->
    <section class="all-partners">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div id="sync1" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{!! asset('uploads') !!}/{!! $food->image !!}" alt="">
                        </div>
                        <div class="item">
                            <img src="images/meal-detail/img-2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/meal-detail/img-3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/meal-detail/img-4.jpg" alt="">
                        </div>

                    </div>

                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="images/meal-detail/thumb-1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/meal-detail/thumb-2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/meal-detail/thumb-3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/meal-detail/thumb-4.jpg" alt="">
                        </div>
                    </div>

                    <div class="resto-meal-dt">
                        <div class="resto-detail">
                            <div class="resto-picy">
                                <a href="restaurant_detail.html"><img src="images/restaurant-detail/logo-10.jpg" alt=""></a>
                            </div>
                            <div class="name-location">
                                <a href="restaurant_detail.html">
                                    <h1>
                                        {!! $food->restaurant->name !!} 
                                        @if(isThisRestaurantFavouritedByAuthUser( $food->restaurant->id) )
                                        <a href="{!!route('frontend.favourite.removeRestaurant', $food->restaurant->id)!!}" onclick="return confirm('Sur want to remove from favourite ?')">
                                        <span class="views mt-3" data-toggle="tooltip" data-placement="top" title="Added to Favourite">
                                            <i class="fas fa-heart text-success text-sm"></i>
                                        </span>
                                        </a>
                                        @endif
                                    </h1>
                                </a>
                                <p><span><i class="fas fa-map-marker-alt"></i></span>{!! $food->restaurant->city !!}</p>
                            </div>
                        </div>
                        <div class="right-side-btns">
                            @if(isThisRestaurantFavouritedByAuthUser( $food->restaurant->id) )
                                
                            @else
                                <div class="bagde-dt">
                                    <a href="{!!route('frontend.favourite.addRestaurant', $food->restaurant->id)!!}" onclick="return confirm('Add to favourite?')">
                                    <div class="partner-badge">
                                        Add to Favourite
                                    </div>
                                    </a>
                                </div>
                            @endif
                            <div class="resto-review-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>3/5</span>
                            </div>
                        </div>
                    </div>
                    <div class="published-like-comments">
                        <div class="published-time">
                            <span><i class="far fa-calendar-alt"></i> Member since {!! $food->restaurant->created_at !!}</span>
                        </div>
                        <div class="like-comments">
                            <ul>
                                <li>
										<span class="views" data-toggle="tooltip" data-placement="top" title="Likes">
											<i class="fas fa-heart"></i>
											<ins>362</ins>
										</span>
                                </li>
                                <li>
										<span class="views" data-toggle="tooltip" data-placement="top" title="Comments">
											<i class="fas fa-comment-alt"></i>
											<ins>{!! $food->reviews->count() !!}</ins>
										</span>
                                </li>
                                <li>
										<span class="views" data-toggle="tooltip" data-placement="top" title="Views">
											<i class="fas fa-eye"></i>
											<ins>5k</ins>
										</span>
                                </li>
                                <li>
                                    <div class="btn-group social-share">
											<span class="dropdown-toggle-no-caret views" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false" role="main" title="share">
												<i class="fas fa-share-alt"></i>
												<ins>Share</ins></span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
                                            <a href="#"><i class="fab fa-twitter"></i>Twitter</a>
                                            <a href="#"><i class="fab fa-google-plus-g"></i>Google+</a>
                                            <a href="#"><i class="fab fa-instagram"></i>Instagram</a>
                                            <a href="#"><i class="fab fa-pinterest-p"></i>Pinterest</a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i>LinkedIn</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="all-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#reviews" class="nav-link" aria-controls="reviews" role="tab"
                                   data-toggle="tab">{!! $food->reviews->count() !!} Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="comments">
                                
                            </div>

                            <div class="tab-pane" role="tabpanel" id="reviews">
                                <div class="comment-post">
                                    <div class="post-items">
                                        <a href="my_dashboard.html">
                                            <div class="img-dp">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </a>
                                        <form action="{!! route('frontend.rating_reviews.food_review_submit') !!}" method="POST">
                                            @csrf
                                        <div class="select-rating">
                                            <h4>Your Rating :</h4>
                                            <ul class="rating-stars">
                                                <li><i class="fas fa-star" onclick="setRating(1)"></i></li>
                                                <li><i class="fas fa-star" onclick="setRating(2)"></i></li>
                                                <li><i class="fas fa-star" onclick="setRating(3)"></i></li>
                                                <li><i class="fas fa-star" onclick="setRating(4)"></i></li>
                                                <li><i class="fas fa-star" onclick="setRating(5)"></i></li>
                                            </ul>
                                        </div>
                                            <input type="hidden" name="star_count" value="0" required>
                                            <input type="hidden" name="restaurant_id" value="{!! $food->restaurant->id !!}">
                                            <input type="hidden" name="food_id" value="{!! $food->id !!}">
                                            <input type="text" class="rating-input" name="review_content"
                                                   placeholder="Please describe the reason for your rating to help the author">
                                            <input class="rating-btn btn-link" type="submit" value="Save Review">
                                        </form>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">

                                        @foreach($food->reviews as $review)
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img
                                                        src="images/recipe-details/comment-5.png" alt=""></a>
                                            <h4>{!! $review->user->name !!}</h4><br>
                                            <div class="rate-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>{!! $review->count_stars !!}</span>
                                            </div>
                                        </div>
                                        <div class="reply-time">
                                            <p><i class="far fa-clock"></i>{!! $review->created_at->diffForHumans(); !!}</p>
                                        </div>
                                            <div class="comment-description">
                                                <p>{!! $review->review_content !!}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="right-side">
                        <div class="new-heading t-bottom">
                            <h1>{!! $food->food_name !!}</h1>
                        </div>
                        <div class="about-meal">
                            <h4> Description</h4>
                            <p>{!! $food->description !!}</p>
                            <a href="javascript:;" onclick="myFunction()" id="readBtn">See All</a>
                        </div>
                        <div class="price">
                            <span class="food_price">{!! $food->price !!}</span>
                        </div>
                        <div class="dt-detail">
                            <ul>
                                <li>
                                    <div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free :
                                        <span class="food_delivery_charge">{!! $food->restaurant->delivery_charge !!}</span></div>
                                </li>
                                <li>
                                    <div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
                                </li>
                            </ul>
                        </div>
                        <div class="Extra-option">
                            <h4> Extras -
                                <ins>(Please select any option)</ins>
                            </h4>
                            <div class="non-veg">
                                <h6>Non Vegetarian</h6>
                                <ul class="food-bootom">
                                    @foreach( $extra_foods_non_vegetarian as $extra_food )
                                        <li>
                                            <p class="food-left">
                                                <input type="checkbox" onchange="calculateTotalAmountInFoodDetail()" value="{!! $extra_food->id !!}"
                                                       id="c1_{!! $extra_food->id !!}" name="extra_food">
                                                <label for="c1_{!! $extra_food->id !!}">{!! $extra_food->name !!}</label>
                                            </p>
                                            <span class="ep_{!! $extra_food->id !!}">{!! $extra_food->price !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="non-veg j-top">
                                <h6>Vegetarian</h6>
                                <ul class="food-bootom">
                                    @foreach($extra_foods_vegetarian as $extra_food)
                                        <li>
                                            <p class="food-left">
                                                <input type="checkbox" onchange="calculateTotalAmountInFoodDetail()" value="{!! $extra_food->id !!}"
                                                       id="c2_{!! $extra_food->id !!}" name="extra_food">
                                                <label for="c2_{!! $extra_food->id !!}">{!! $extra_food->name !!}</label>
                                            </p>
                                            <span class="ep_{!! $extra_food->id !!}">{!! $extra_food->price !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="Qty">
                            <h4> Qty</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="minus-btn btn-sm" id="minus-btn"><i class="fas fa-minus-square"></i>
                                    </button>
                                </div>
                                <input type="number" id="qty_input" class="qty-control" value="1" min="1">
                                <div class="input-group-prepend">
                                    <button class="add-btn btn-sm" id="plus-btn" onclick="calculateTotalAmountInFoodDetail()"><i class="fas fa-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="total-cost">
                            <div class="total-text">
                                <h5>Total</h5>
                            </div>
                            <div class="total-price">
                                <p></p>
                            </div>
                        </div>
                        <div class="order-now-check">
                            <button class="on-btn btn-link" onclick="addToCart({!! $food->id !!})">Order Now</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--meal-deail end-->
@endsection
@section('custom_script')
    <script src="{!! asset('frontend') !!}/assets/owlcarousel/owl.carousel.js"></script>
    <script src="{!! asset('frontend') !!}/js/custom.js"></script>
    <script src="{!! asset('frontend') !!}/js/thumbnail.slider.js"></script>
    <script src="{!! asset('frontend') !!}/js/bootstrap-datepicker.js"></script>
    <script src="{!! asset('frontend') !!}/js/bootstrap-select.js"></script>
    <script src="{!! asset('frontend') !!}/js/custom/food_details.js"></script>
@endsection
