<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Get your favaourite foods from home">
    <meta name="author" content="">

    <!-- Favicon -->
    <link href="<?php echo asset('uploads'); ?>/logo/<?php echo e($gd['globals']->website_logo); ?>" rel="shortcut icon" type="image/x-icon"/>

    <title><?php echo e($gd['globals']->app_name); ?> | <?php echo e($title ?? ''); ?> </title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo asset('frontend/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('frontend/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('frontend/css/responsive.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('frontend/css/mega.menu.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('frontend/css/thumbnail.slider.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('frontend/css/bootstrap-select.css'); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend')); ?>/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo asset('frontend/css/owlslider.css'); ?>" rel="stylesheet">
    
    <!-- Owl Carousel for this template-->
    
    <link href="<?php echo asset('frontend/vendor/OwlCarousel/assets/owl.carousel.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('frontend/vendor/OwlCarousel/assets/owl.theme.default.min.css'); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo asset('assets/frontend/plugins/growl-alert/stylesheets/jquery.growl.css'); ?>">
    <!-- Fontawesome styles for this template-->
    <link href="<?php echo asset('frontend/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/custom/style.css'); ?>">

    <!-- Croppie style -->
    <link href="<?php echo asset('backend/assets/css/plugin/croppie/croppie.css'); ?>" rel="stylesheet" type="text/css" />

    <?php echo $__env->yieldContent('custom_style'); ?>
</head>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/partials/_head.blade.php ENDPATH**/ ?>