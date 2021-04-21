<?php $__env->startSection('custom_style'); ?>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo asset('frontend'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset('frontend'); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo asset('frontend'); ?>/css/responsive.css" rel="stylesheet">
    <link href="<?php echo asset('frontend'); ?>/css/mega.menu.css" rel="stylesheet">
    <link href="<?php echo asset('frontend'); ?>/css/thumbnail.slider.css" rel="stylesheet">
    <link href="<?php echo asset('frontend'); ?>/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo asset('frontend'); ?>/css/bootstrap-select.css" rel="stylesheet">
    <!-- Owl Carousel for this template-->
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <!-- Fontawesome styles for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
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
                            <li class="breadcrumb-item"><a href="<?php echo route('frontend.home'); ?>">Home</a></li>
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
                        <?php if($food->image1): ?> 
                        <div class="item">
                            <img src="<?php echo asset('uploads'); ?>/<?php echo $food->image1; ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <?php if($food->image2): ?>
                        <div class="item">
                            <img src="<?php echo asset('uploads'); ?>/<?php echo $food->image2; ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <?php if($food->image3): ?>
                        <div class="item">
                            <img src="<?php echo asset('uploads'); ?>/<?php echo $food->image3; ?>" alt="">
                        </div>
                        <?php endif; ?>
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
                                <a href="<?php echo route('frontend.restaurant.details', $food->restaurant->id); ?>">
                                    <img src="<?php echo asset('uploads'); ?>/<?php echo $food->restaurant->logo; ?>" alt="" style="width: 70px; height: 70px;">
                                </a>
                            </div>
                            <div class="name-location">
                                <a href="<?php echo route('frontend.restaurant.details', $food->restaurant->id); ?>">
                                    <h1>
                                        <?php echo $food->restaurant->name; ?>

                                    </h1>
                                </a>
                                <p><span><i class="fas fa-map-marker-alt"></i></span><?php echo $food->restaurant->restCity->name; ?></p>
                            </div>
                        </div>
                        <div class="right-side-btns">
                            <div class="bagde-dt favourite_btn" ajaxUrl="<?php echo e(Auth::id() ? route('frontend.food.addToFavourite', [Auth::id(),$food->id]) : '0'); ?>">
                                <div class="partner-badge favourite_btn_text">
                                    <?php if($f == 1): ?>
                                        Added to favourite
                                    <?php else: ?>
                                        Add to favourite
                                    <?php endif; ?>
                                </div>                                          
                            </div>
                            <div class="resto-review-stars">
                                <?php $average_rating = intval( \App\Helpers\Helper::getRestaurantAverageRating($food->restaurant->id) ) ?>
                                <?php for($i = 0; $i < $average_rating; $i++): ?> 
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                                <span> <?php echo e(number_format ( \App\Helpers\Helper::getRestaurantAverageRating($food->restaurant->id), 1 )); ?> / 5</span>
                            </div>
                        </div>
                    </div>
                    <div class="published-like-comments">
                        <div class="published-time">
                            <span><i class="far fa-calendar-alt"></i> Member since <?php echo substr($food->restaurant->created_at,0,10); ?></span>
                        </div>
                        <div class="like-comments">
                            <ul>
                                <li>
										<span class="views" data-toggle="tooltip" data-placement="top" title="Likes">
											<i class="fas fa-heart"></i>
											<ins><?php echo $food->favourites->count(); ?></ins>
										</span>
                                </li>
                                <li>
										<span class="views" data-toggle="tooltip" data-placement="top" title="Comments">
											<i class="fas fa-comment-alt"></i>
											<ins><?php echo $food->reviews->count(); ?></ins>
										</span>
                                </li>
                                <li>
										<span class="views" data-toggle="tooltip" data-placement="top" title="Views">
											<i class="fas fa-eye"></i>
											<ins><?php echo $food->view; ?></ins>
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
                            <li class ="nav-item" role="presentation">
                                <a href="#comments" class="nav-link active" aria-controls="comments" role="tab" data-toggle="tab"><?php echo $food->comments->count(); ?> Comments</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#reviews" class="nav-link" aria-controls="reviews" role="tab"
                                   data-toggle="tab"><?php echo $food->reviews->count(); ?> Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="comments">
                                <div class="comment-post">
                                    <div class="post-items">                                        
                                        <div class="img-dp">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <form action="<?php echo route('frontend.food.add_comment'); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="food_id" value="<?php echo $food->id; ?>">
                                            <input type="text" class="post-input" name="comment" placeholder="Write a comment">
                                            <div class="m-2 p-2"></div>
                                            <input class="submit-btn btn-link ml-4" type="submit" value="Post Comment">
                                        </form>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <?php $__currentLoopData = $food->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="comment-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="<?php echo asset('uploads'); ?>/<?php echo $comment->customer->avatar; ?>" alt=""></a>
                                            <h4> <?php echo $comment->customer->name; ?> </h4>
                                        </div>
                                        <div class="reply-time">
                                            <a href="#reply-comment">Reply</a>
                                            <p><i class="far fa-clock"></i><?php echo $comment->created_at->diffForHumans();; ?> </p>
                                        </div>
                                        <div class="comment-description">
                                            <p><?php echo $comment->comment; ?></p>
                                        </div>
                                    </div>

                                    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <div class="reply-1 ">
                                        <div class="user-detail-heading ml-4">
                                            <a href="user_profile_view.html"><img src="<?php echo asset('uploads'); ?>/<?php echo $reply->user->avatar; ?>" alt=""></a>
                                            <h4> <?php echo $reply->user->name; ?> </h4>
                                        </div>
                                        <div class="reply-time">                                
                                            <p><i class="far fa-clock"></i><?php echo $reply->created_at->diffForHumans();; ?></p>
                                        </div>
                                        <div class="comment-description ml-4">
                                            <p><a href="user_profile_view.html"></a><?php echo $reply->reply_content; ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <div class="reply-comment">
                                        <div class="post-items">                                            
                                            <div class="reply-dp">
                                                <a href="my_dashboard.html"><img src="images/recipe-details/reply-1.png" alt=""></a>
                                            </div>
                                            <form action="<?php echo route('frontend.food.add_comment_reply'); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="comment_id" value="<?php echo $comment->id; ?>">
                                                <input type="text" class="reply-input" name="reply_content" placeholder="Write a reply">
                                                <input class="reply-btn btn-link" type="submit" value="Reply">
                                            </form>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <form action="<?php echo route('frontend.rating_reviews.food_review_submit'); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                        <div class="select-rating">
                                            <h4>Your Rating :</h4>
                                            <ul class="rating-stars">
                                                <li><i class="fas fa-star" id="abc_1" onclick="setRating(1)"></i></li>
                                                <li><i class="fas fa-star" id="abc_2" onclick="setRating(2)"></i></li>
                                                <li><i class="fas fa-star" id="abc_3" onclick="setRating(3)"></i></li>
                                                <li><i class="fas fa-star" id="abc_4" onclick="setRating(4)"></i></li>
                                                <li><i class="fas fa-star" id="abc_5" onclick="setRating(5)"></i></li>
                                            </ul>
                                        </div>
                                            <input type="hidden" name="star_count" value="0" required>
                                            <input type="hidden" name="restaurant_id" value="<?php echo $food->restaurant->id; ?>">
                                            <input type="hidden" name="food_id" value="<?php echo $food->id; ?>">
                                            <input type="text" class="rating-input" name="review_content"
                                                   placeholder="Please describe the reason for your rating to help the author" required>
                                            <input class="rating-btn btn-link" type="submit" value="Save Review">
                                        </form>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">
                                        <?php $__currentLoopData = $food->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="https://placehold.it/200x200" alt=""></a>
                                            <h4><?php echo $review->user->name; ?></h4><br>
                                            <div class="rate-star">
                                                <?php for( $i = 0; $i < $review->count_stars; $i++ ): ?> 
                                                    <i class="fas fa-star"></i>
                                                <?php endfor; ?>
                                                <span><?php echo $review->count_stars; ?> / 5</span>
                                            </div>
                                        </div>
                                        <div class="reply-time">
                                            <p><i class="far fa-clock"></i><?php echo $review->created_at->diffForHumans();; ?></p>
                                        </div>
                                            <div class="comment-description">
                                                <p><?php echo $review->review_content; ?></p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="right-side">
                        <div class="new-heading t-bottom">
                            <h1><?php echo $food->food_name; ?></h1>
                        </div>
                        <div class="about-meal">
                            <h4> Description</h4>
                            <p><?php echo substr( $food->description, 0, 200); ?></p>
                            <a href="javascript:;" onclick="myFunction()" id="readBtn">See All</a>
                        </div>
                        <div class="price">
                            <span class="food_price"><?php echo $food->price; ?></span>
                        </div>
                        <div class="dt-detail">
                            <ul>
                                <li>
                                    <div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Fee :
                                        <span class="food_delivery_charge"><?php echo $food->restaurant->delivery_charge; ?></span></div>
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
                                    <?php $__currentLoopData = $extra_foods_non_vegetarian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra_food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>

                                            <p class="food-left">
                                                <input type="checkbox" onchange="calculateTotalAmountInFoodDetail()" value="<?php echo $extra_food->id; ?>"
                                                       id="c1_<?php echo $extra_food->id; ?>" name="extra_food">
                                                <label for="c1_<?php echo $extra_food->id; ?>" class="pr-2"><?php echo $extra_food->name; ?></label>


                                                <span class="ef_add-btn btn-sm" onclick="addOne(<?php echo $extra_food->id; ?> , <?php echo $extra_food->price; ?>)"><i class="fas fa-plus-square"></i>
                                                </span>
                                                
                                                <span>
                                                    <input type="text" class="ef_qty_<?php echo $extra_food->id; ?>" value="1" min="1" style="width: 30px; height: 30px; border-radius: 2px; text-align: center; border: 1px solid grey;">
                                                </span>
                                                
                                                <span class="ef_minus-btn btn-sm" onclick="minusOne(<?php echo $extra_food->id; ?>, <?php echo $extra_food->price; ?>)"><i class="fas fa-minus-square"></i>
                                                </span>
                                                        

                                            </p>

                                            <span class="ep_<?php echo $extra_food->id; ?>"><?php echo $extra_food->price; ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="non-veg j-top">
                                <h6>Vegetarian</h6>
                                <ul class="food-bootom">
                                    <?php $__currentLoopData = $extra_foods_vegetarian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra_food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>

                                            <p class="food-left">
                                                <input type="checkbox" onchange="calculateTotalAmountInFoodDetail()" value="<?php echo $extra_food->id; ?>"
                                                       id="c1_<?php echo $extra_food->id; ?>" name="extra_food">
                                                <label for="c1_<?php echo $extra_food->id; ?>" class="pr-2"><?php echo $extra_food->name; ?></label>


                                                <span class="ef_add-btn btn-sm" onclick="addOne(<?php echo $extra_food->id; ?> , <?php echo $extra_food->price; ?>)"><i class="fas fa-plus-square"></i>
                                                </span>
                                                
                                                <span>
                                                    <input type="text" class="ef_qty_<?php echo $extra_food->id; ?>" value="1" min="1" style="width: 30px; height: 30px; border-radius: 2px; text-align: center; border: 1px solid grey;">
                                                </span>
                                                
                                                <span class="ef_minus-btn btn-sm" onclick="minusOne(<?php echo $extra_food->id; ?>, <?php echo $extra_food->price; ?>)"><i class="fas fa-minus-square"></i>
                                                </span>
                                                        

                                            </p>

                                            <span class="ep_<?php echo $extra_food->id; ?>"><?php echo $extra_food->price; ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <button class="on-btn btn-link" onclick="addToCart(<?php echo $food->id; ?>)">Order Now</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--meal-deail end-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
    
    <script src="<?php echo asset('frontend'); ?>/assets/owlcarousel/owl.carousel.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/custom.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/thumbnail.slider.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/bootstrap-select.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/custom/food_details.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', ['title'=>'Food Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/pages/food_details.blade.php ENDPATH**/ ?>