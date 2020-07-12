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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                            <img src="{!! asset('uploads/food') !!}/{!! $food->image !!}" alt="">
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
                                <a href="restaurant_detail.html"><h1>{!! $food->restaurant->name !!}</h1></a>
                                <p><span><i class="fas fa-map-marker-alt"></i></span>{!! $food->restaurant->city !!}</p>
                            </div>
                        </div>
                        <div class="right-side-btns">
                            <div class="bagde-dt">
                                <div class="partner-badge">
                                    Partner
                                </div>
                            </div>
                            <div class="resto-review-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>4.5/5</span>
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
											<ins>05</ins>
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
                                <a href="#comments" class="nav-link active" aria-controls="comments" role="tab"
                                   data-toggle="tab">05 Comments</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#reviews" class="nav-link" aria-controls="reviews" role="tab"
                                   data-toggle="tab">03 Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="comments">
                                <div class="comment-post">
                                    <div class="post-items">
                                        <div class="img-dp">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <form>
                                            <input type="text" class="post-input" name="post"
                                                   placeholder="Write a comment">
                                            <input class="submit-btn btn-link" type="submit" value="Post Comment">
                                        </form>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="comment-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img
                                                        src="images/recipe-details/comment-1.png" alt=""></a>
                                            <h4> Rock Smith</h4>
                                        </div>
                                        <div class="reply-time">
                                            <a href="#reply-comment">Reply</a>
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit
                                                amet efficitur quam aliquam non. Integer gravida ex quis lacinia
                                                consectetur.</p>
                                        </div>
                                    </div>
                                    <div class="reply-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img
                                                        src="images/recipe-details/reply-1.png" alt=""></a>
                                            <h4> Rock Smith</h4>
                                        </div>
                                        <div class="reply-time">
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p><a href="user_profile_view.html">@RockSmith</a> Thank you</p>
                                        </div>
                                    </div>
                                    <div class="reply-comment">
                                        <div class="post-items">
                                            <div class="reply-dp">
                                                <a href="my_dashboard.html"><img src="images/recipe-details/reply-1.png"
                                                                                 alt=""></a>
                                            </div>
                                            <form>
                                                <input type="text" class="reply-input" name="post"
                                                       placeholder="Write a reply">
                                                <input class="reply-btn btn-link" type="submit" value="Reply">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="comment-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img
                                                        src="images/recipe-details/comment-2.png" alt=""></a>
                                            <h4> Jassica William</h4>
                                        </div>
                                        <div class="reply-time">
                                            <a href="#reply-comment">Reply</a>
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit
                                                amet efficitur quam aliquam non. Integer gravida ex quis lacinia
                                                consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="comment-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img
                                                        src="images/recipe-details/comment-3.png" alt=""></a>
                                            <h4> Jass Singh</h4>
                                        </div>
                                        <div class="reply-time">
                                            <a href="#reply-comment">Reply</a>
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit
                                                amet efficitur quam aliquam non. Integer gravida ex quis lacinia
                                                consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="comment-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img
                                                        src="images/recipe-details/comment-4.png" alt=""></a>
                                            <h4> Johnson Smith</h4>
                                        </div>
                                        <div class="reply-time">
                                            <a href="#reply-comment">Reply</a>
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit
                                                amet efficitur quam aliquam non. Integer gravida ex quis lacinia
                                                consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="comment-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img
                                                        src="images/recipe-details/comment-5.png" alt=""></a>
                                            <h4> Joy Cutler</h4>
                                        </div>
                                        <div class="reply-time">
                                            <a href="#reply-comment">Reply</a>
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit
                                                amet efficitur quam aliquam non. Integer gravida ex quis lacinia
                                                consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-pagination">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="reviews">
                                <div class="comment-post">
                                    <div class="post-items">
                                        <a href="my_dashboard.html">
                                            <div class="img-dp">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </a>
                                        <div class="select-rating">
                                            <h4>Your Rating :</h4>
                                            <ul class="rating-stars">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <form action="{!! route('frontend.rating_reviews.food_review_submit') !!}" method="POST">
                                            @csrf
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
                                                <span>4.5</span>
                                            </div>
                                        </div>
                                        <div class="reply-time">
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
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
                            <span>${!! $food->price !!}</span>
                        </div>
                        <div class="dt-detail">
                            <ul>
                                <li>
                                    <div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free :
                                        ${!! $food->restaurant->delivery_charge !!}</div>
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
                                                <input type="checkbox" value="{!! $extra_food->price !!}"
                                                       id="c1_{!! $extra_food->id !!}" name="cb">
                                                <label for="c1_{!! $extra_food->id !!}">{!! $extra_food->name !!}</label>
                                            </p>
                                            <span>${!! $extra_food->price !!}</span>
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
                                                <input type="checkbox" value="{!! $extra_food->price !!}"
                                                       id="c2_{!! $extra_food->id !!}" name="cb">
                                                <label for="c2_{!! $extra_food->id !!}">{!! $extra_food->name !!}</label>
                                            </p>
                                            <span>${!! $extra_food->price !!}</span>
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
                                    <button class="add-btn btn-sm" id="plus-btn"><i class="fas fa-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="total-cost">
                            <div class="total-text">
                                <h5>Total</h5>
                            </div>
                            <div class="total-price">
                                <p>$17.00</p>
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
    <script>
        $(document).ready(function () {
            $('#qty_input').prop('disabled', true);
            $('#plus-btn').click(function () {
                $('#qty_input').val(parseInt($('#qty_input').val()) + 1);
            });
            $('#minus-btn').click(function () {
                $('#qty_input').val(parseInt($('#qty_input').val()) - 1);
                if ($('#qty_input').val() == 0) {
                    $('#qty_input').val(1);
                }
            });
        });


    </script>
@endsection