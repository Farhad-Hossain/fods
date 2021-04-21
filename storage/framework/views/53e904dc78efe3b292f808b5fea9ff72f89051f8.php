<base href="">
<meta charset="utf-8" />
<title>Online Food Delivery | <?php echo e($title ?? ''); ?></title>
<meta name="description" content="Updates and statistics" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="<?php echo asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="<?php echo asset('backend/assets/plugins/global/plugins.bundle.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo asset('backend/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo asset('backend/assets/css/style.bundle.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<?php if($gd['globals']->theme_color == 1): ?>
    <link href="<?php echo asset('backend/assets/css/themes/layout/header/base/dark.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('backend/assets/css/themes/layout/header/menu/dark.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
<?php elseif($gd['globals']->theme_color == 2): ?>
    <link href="<?php echo asset('backend/assets/css/themes/layout/header/base/light.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('backend/assets/css/themes/layout/header/menu/light.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />    
<?php endif; ?>

<?php if($gd['globals']->navbar_color == 1): ?>
    <link href="<?php echo asset('backend/assets/css/themes/layout/aside/dark.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('backend/assets/css/themes/layout/brand/dark.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
<?php elseif( $gd['globals']->navbar_color == 2 ): ?>
    <link href="<?php echo asset('backend/assets/css/themes/layout/aside/light.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('backend/assets/css/themes/layout/brand/light.css?v=7.0.3'); ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>

<!--end::Layout Themes-->
<link rel="icon" href="<?php echo asset('uploads'); ?>/logo/<?php echo e($gd['globals']->address_bar_icon); ?>" type="image/icon type" />

<link rel="stylesheet" href="<?php echo asset('assets/frontend/plugins/growl-alert/stylesheets/jquery.growl.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo asset('backend'); ?>/assets/css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo asset('backend'); ?>/assets/js/datatable.js">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />


<?php echo $__env->yieldContent('custom_style'); ?>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/partials/_head.blade.php ENDPATH**/ ?>