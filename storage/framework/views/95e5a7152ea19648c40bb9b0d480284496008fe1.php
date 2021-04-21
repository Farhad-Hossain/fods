<?php $__env->startSection('custom_style'); ?>
    <link rel="stylesheet" href="<?php echo asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend'); ?>/css/custom/add_restaurant.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

    <!--banner start-->
    <?php echo $__env->make('frontend.partials._banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                <a href="<?php echo e(route('frontend.restaurant.restaurantAndMore')); ?>">
                                    <div class="b-icon">
                                        <img src="<?php echo asset('frontend/images/'); ?>/homepage/browse_places/02.svg" alt="">
                                    </div>
                                    <div class="b-text">
                                        Restaurant & More
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="places">
                                <a href="<?php echo e(route('frontend.restaurant.restaurantAndMore')); ?>">
                                    <div class="b-icon">
                                        <img src="<?php echo asset('frontend/images/'); ?>/homepage/browse_places/06.svg" alt="">
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
                            <img src="<?php echo asset('frontend/images/'); ?>/homepage/how-to-work/img_1.svg" alt="">
                        </div>
                        <div class="work-text">
                            <h4>Choose Your Area Restaurant</h4>
                            <p>Choose Your area of restaurant and browse all of your favourite food available from there. </p>
                        </div>
                    </div>
                </div><div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="work-item">
                        <div class="work-img">
                            <img src="<?php echo asset('frontend/images/'); ?>/homepage/how-to-work/img_2.svg" alt="">
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
                            <img src="<?php echo asset('frontend/images/'); ?>/homepage/how-to-work/img_3.svg" alt="">
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
                                <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <a href="<?php echo e(route('frontend.restaurant.details',$new_restaurant->id)); ?>">
                                            <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($new_restaurant->logo); ?>" alt="" class="new-restaurant-img">
                                        </a>
                                        <p class="text-center"><?php echo e($new_restaurant->name); ?></p>
                                    </div>
                                    <?php if($loop->iteration == 5): ?>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="meal-btn">
                <a href="<?php echo e(route('frontend.restaurant.all_restaurant',['search_city_area' => $search_city_area])); ?>" class="m-btn btn-link">Show All</a>
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
                <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="all-meal">
                        <div class="top">
                            <a href="<?php echo route('frontend.food.details', $food->id); ?>"><div class="bg-gradient"></div></a>
                            <div class="top-img">
                                <img src="<?php echo asset('uploads'); ?>/<?php echo $food->image1; ?>" alt="" style="width: 100%; min-height: 185px; max-height: 185px;">
                            </div>
                            <div class="logo-img">
                                <img src="<?php echo asset('uploads'); ?>/<?php echo $food->restaurant->logo; ?>" alt="" style="width: 70px; height: 70px;">
                            </div>
                            <div class="top-text">
                                <div class="heading"><h4><a href="<?php echo route('frontend.food.details', $food->id); ?>"><?php echo $food->food_name; ?></a></h4></div>
                                <div class="sub-heading">
                                    <h5><a href="<?php echo route('frontend.food.details', $food->id); ?>"><?php echo substr($food->restaurant->name, 0, 8); ?></a></h5>
                                    <p>$<?php echo $food->price; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="bottom">
                            <div class="bottom-text">
                                
                                <div class="delivery">
                                    <i class="fas fa-shopping-cart"></i>
                                    Delivery Fee : $<?php echo $food->restaurant->delivery_charge; ?>

                                </div>

                                <div class="time">
                                    <i class="far fa-clock"></i>
                                    Delivery Time : <?php echo $food->restaurant->delivery_time; ?> Min
                                </div>

                                <div class="star">
                                    <?php $aux = intval( \App\Helpers\Helper::getFoodAverageRating($food->id) ) ?>
                                    <?php for( $i = 0; $i < $aux; $i++ ): ?> 
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                    
                                    <span><?php echo number_format( \App\Helpers\Helper::getFoodAverageRating($food->id), 1 ); ?></span>
                                    
                                    <div class="comments">
                                        <a href="<?php echo route('frontend.food.details', $food->id); ?>">
                                            <i class="fas fa-comment-alt"></i><?php echo $food->reviews->count(); ?>

                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                <a href="<?php echo e(route('frontend.customer-register')); ?>" class="of-btn btn-link">Sign up Now</a>
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
                                    <?php $__currentLoopData = $food_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <a href="<?php echo e(route('frontend.food.searchByCategory',$category->id)); ?>">
                                                <div class="meal-icon">
                                                    <img src="<?php echo asset('uploads'); ?>/<?php echo e($category->image); ?>" alt="">
                                                </div>
                                                <div class="meal-title">
                                                    <?php echo e($category->name); ?>

                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <h1><?php echo e($gd['globals']->app_name); ?> - in Your Pocket</h1>
                        </div>
                        <div class="line">
                            <img src="<?php echo asset('frontend/images/'); ?>/homepage/line.svg" alt="">
                        </div>
                        <p>We’ll send you a link, open it on your phone to download the app.</p>
                        <form class="search-form">
                            <input type="text" class="send-link" placeholder="Enter your email address">
                            <button type="submit" class="pocket-btn">Send Link</button>
                        </form>
                        <div class="download-btns">
                            <a href="#"><img src="<?php echo asset('frontend/images/'); ?>/homepage/app-store.png" alt=""></a>
                            <a href="#"><img src="<?php echo asset('frontend/images/'); ?>/homepage/play-store.png" alt=""></a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <!-- Area search Modal-->
    <div class="modal fade" id="area_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo route('frontend.home'); ?>" method="GET">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center">Where you want our Food ?</p>
                            </div>

                            <div class="search col-12">
                                <select class="search-location" name="search_city_area" >
                                    <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo $area->id; ?>"><?php echo $area->area_name; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                                </select>
                                <div class="icon-btn">
                                    <div class="cross-icon">
                                        <i class="fas fa-crosshairs"></i>
                                    </div>
                                    <div class="s-m-btn">
                                        <button class="search-meal-btn btn-link">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom_script'); ?>

<script type="text/javascript">
    var isshow = localStorage.getItem('isshow');
    if (isshow === null) {
        localStorage.setItem('isshow', 1);
        $("#area_modal").modal();
    } else {
        console.log('Area selection modal has been showed.');   
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', ['title'=>'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/index.blade.php ENDPATH**/ ?>