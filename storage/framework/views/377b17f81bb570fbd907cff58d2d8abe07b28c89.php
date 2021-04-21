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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

    <?php echo $__env->make('backend.message.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.message.emergency_form_validation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                <?php if(!empty($cart_contents)): ?>
                                    <?php $__currentLoopData = $cart_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                            $rest_id = $content->options['restaurant_info']->id; 
                                            $restCityAreas = $content->options['restaurant_info']->restCity->areas;
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="checkout-thumb">
                                                    <a href="#">
                                                        <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($content->options['food_info']->image1 ?? ''); ?>" class="img-responsive" alt="thumb" title="thumb">
                                                    </a>
                                                </div>
                                                <div class="name">
                                                    <a href="<?php echo route('frontend.food.details', $content->id); ?>" target="_BLANK"><h4><?php echo $content->name; ?></h4></a>
                                                    <a href="<?php echo route('frontend.restaurant.details', $content->options['restaurant_info']->id); ?>" target="_BLANK"><p><?php echo $content->options['restaurant_info']->name ?? ''; ?></p></a>
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
                                            <td class="td-content" colspan="2"><?php echo $content->qty; ?></td>
                                            <td class="td-content"><?php echo $content->price; ?></td>
                                            <td class="td-content"><?php echo $content->price * $content->qty; ?></td>
                                            <td><button class="remove-btn" onclick="removeContent(
                                            <?php echo $content->id; ?>, false)">Remove</button></td>
                                        </tr>
                                        <?php ($subTotal += ($content->price * $content->qty)); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(!empty($cart_contents)): ?>
                                    <?php $__currentLoopData = $extra_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="checkout-thumb">
                                                    <a href="#">
                                                        <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($content->options['extra_food_info']->photo ?? ''); ?>" class="img-responsive" alt="thumb" title="thumb">
                                                    </a>
                                                </div>
                                                <div class="name">
                                                    <a href="#"><h4><?php echo $content->name; ?></h4></a>
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
                                            <td class="td-content" colspan="2"><?php echo $content->qty; ?></td>
                                            <td class="td-content"><?php echo $content->price; ?></td>
                                            <td class="td-content"><?php echo $content->price * $content->qty; ?></td>
                                            <td><button class="remove-btn" onclick="removeContent(<?php echo $content->id; ?>, true)">Remove</button></td>
                                        </tr>
                                        <?php ($subTotal += ($content->price * $content->qty)); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                                <tbody>
                                <tr>
                                    <td colspan="5">
                                        <h3 class="text-right">Total <ins><?php echo $subTotal; ?></ins></h3>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
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
                    
                    
                    
                    <div class="your-order">
                        <h4>Your Order</h4>

                        <div class="order-d">
                            <div class="item-dt-left">
                                <span>Item Total</span>
                            </div>
                            <div class="item-dt-right">
                                <p id="total_item"><?php echo number_format($subTotal, 2); ?></p>
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
                                <span id="taxt_value_unit">Taxes ( <?php echo $gd['globals']->product_tax; ?>% )</span>
                            </div>
                            <div class="item-dt-right">
                                <?php $total_tax = ( $subTotal * $gd['globals']->product_tax ) / 100 ?>
                                <p id="tax_value_total"><?php echo $total_tax; ?></p>
                            </div>
                        </div>
                        <div class="order-d">
                            <div class="item-dt-left">
                                <span>Delivery Charges</span>
                            </div>
                            <div class="item-dt-right">
                                <p id="delivery_charge"><?php echo number_format($delivery_charge, 2); ?></p>
                            </div>
                        </div>

                        <div class="promocode ">
                            <h4>Promocode</h4>
                                <input class="coupon-input" id="promocode_field" type="text" placeholder="Enter promo code">
                                <div class="subscribe-btn">
                                    <div class="s-n-btn">
                                        <?php $ajaxRoute = route('frontend.promocodes') ?>
                                        <button class="promocode-btn" onclick="calculateAndChange(
                                        '<?php echo e($subTotal); ?>',
                                        '<?php echo e(($subTotal + $delivery_charge + $total_tax)); ?>',
                                        '<?php echo e($ajaxRoute); ?>'
                                        )">Apply</button>
                                    </div>
                                </div>
                        </div>

                        <div class="total-bill">
                            <div class="total-bill-text">
                                <h5>Total</h5>
                            </div>
                            <div class="total-bill-payment">
                                <p id="total_bill"><?php echo number_format(($subTotal + $delivery_charge + $total_tax), 2); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="checkout-btn ">
                        
                        <form action="<?php echo route('frontend.cart.submit-order'); ?>" method="post">
                            <?php echo csrf_field(); ?>


                            <input type="hidden" name="total_price" value="<?php echo ($subTotal + $delivery_charge + $total_tax); ?>">
                            <input type="hidden" name="restaurant_id" value="<?php echo $rest_id; ?>">
                            <input type="hidden" name="item_total_price" value="<?php echo $subTotal; ?>">
                            <input type="hidden" name="product_tax" value="<?php echo $total_tax; ?>">
                            <input type="hidden" name="delivery_charge" value="<?php echo $delivery_charge; ?>">
                            <input type="hidden" name="promocode_value" value="0">
                            <div class="">
                                <p>Your Delivery Address</p>
                                <textarea name="delivery_address" class="form-control mb-2 text-dark" required><?php echo Auth::user()->customer->default_delivery_address ?? ''; ?></textarea>
                            </div>
                            <button type="submit" class="chkout-btn btn-link">Checkout Now</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--partners end-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
    <script src="<?php echo asset('frontend'); ?>/assets/owlcarousel/owl.carousel.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/custom.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/thumbnail.slider.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/bootstrap-select.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo asset('frontend'); ?>/js/custom/checkout.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', ['title'=>'Checkout'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/pages/checkout.blade.php ENDPATH**/ ?>