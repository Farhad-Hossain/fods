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
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend'); ?>/css/custom/payment_options.css">
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
                        <input type="hidden" id="order_id" value="<?php echo $order->id; ?>">
                        <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="<?php echo e(route('frontend.pay-via-ajax', $order->id)); ?>"> Pay Now
                        </button>
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
    <script src="<?php echo asset('frontend'); ?>/js/custom/payment_options.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', ['title'=>'Payment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/pages/payment-options.blade.php ENDPATH**/ ?>