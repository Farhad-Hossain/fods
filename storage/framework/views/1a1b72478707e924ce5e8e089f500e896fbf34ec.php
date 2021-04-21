<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../">
        <meta charset="utf-8" />
        <title>Food Delivery | Login </title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo e(asset('backend')); ?>/assets/css/pages/login/login-1.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo e(asset('backend')); ?>/assets/plugins/global/plugins.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('backend')); ?>/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('backend')); ?>/assets/css/style.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="<?php echo e(asset('backend')); ?>/assets/css/themes/layout/header/base/light.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('backend')); ?>/assets/css/themes/layout/header/menu/light.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('backend')); ?>/assets/css/themes/layout/brand/dark.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('backend')); ?>/assets/css/themes/layout/aside/dark.css?v=7.0.3" rel="stylesheet" type="text/css" />
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo e(asset('backend')); ?>/assets/media/logos/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
                <!--begin::Aside-->
                <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
                    <!--begin::Aside Top-->
                    <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                        <!--begin::Aside header-->
                        <a href="#" class="text-center mb-10">
                            <img src="<?php echo e(asset('uploads')); ?>/logo/<?php echo $gd['globals']->app_logo; ?>" class="max-h-70px" alt="" />
                        </a>
                        <!--end::Aside header-->
                        <!--begin::Aside title-->
                        <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
                            <?php echo $gd['globals']->app_name; ?>

                        <br />With Excelency</h3>
                        <!--end::Aside title-->
                    </div>
                    <!--end::Aside Top-->
                    <!--begin::Aside Bottom-->
                    <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(assets/media/svg/illustrations/login-visual-1.svg)"></div>
                    <!--end::Aside Bottom-->
                </div>
                
                <!--begin::Aside-->
                <!--begin::Content-->
                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-center">
                        <!--begin::Signin-->
                        <div class="login-form login-signin">
                            <!--begin::Form-->
                            <form class="form"  action="<?php echo e(route('login')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="pb-13 pt-lg-0 pt-5">
                                    <?php echo $__env->make('backend.message.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <!--begin::Title-->
                                <div class="pb-13 pt-lg-0 pt-5">
                                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to <?php echo $gd['globals']->app_name; ?></h3>
                                    <span class="text-muted font-weight-bold font-size-h4">New Here?
                                    <a href="<?php echo route('frontend.customer-register'); ?>" class="text-primary font-weight-bolder">Create an Account</a></span>
                                </div>

                                <!--begin::Title-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark"><?php echo e(__('E-Mail Address')); ?></label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" name="email" autofocus autocomplete="off" required />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5"><?php echo e(__('Password')); ?></label>
                                    </div>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" name="password" autocomplete="off" required />
                                    
                                </div>
                                <!--end::Form group-->
                                <!--begin::Action-->
                                <div class="pb-lg-0 pb-5">
                                    <button type="submit" class="btn btn-primary font-weight-bolder py-2 px-2">Sign In</button>
                                    
                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->
                        <!--begin::Signup-->

                        <div class="login-form login-signup">
                            <!--begin::Form-->
                            <p class="h3">Register as Customer</p>
                            <hr />
                            <form action="<?php echo e(route('frontend.customer-register')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                       <label><?php echo __('common.name'); ?></label>
                                       <input type="text" class="form-control" name="full_name" required />
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo __('common.email'); ?></label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo __('common.phone_number'); ?></label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control">
                                    </div>

                                    <div class="form-group">
                                       <label>Delivery Address</label>
                                        <textarea name="default_delivery_address" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo __('common.password'); ?></label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg btn-info">Back</button>
                                    <button type="submit" class="btn btn-lg btn-primary font-weight-bold">Sign Up</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signup-->
                        <!--begin::Forgot-->
                        <div class="login-form login-forgot">
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                                <!--begin::Title-->
                                <div class="pb-13 pt-lg-0 pt-5">
                                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                                    <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                                </div>
                                <!--end::Title-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group d-flex flex-wrap pb-lg-0">
                                    <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                    <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                                </div>
                                <!--end::Form group-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Forgot-->
                    </div>
                    <!--end::Content body-->
                    <!--begin::Content footer-->
                    
                    <!--end::Content footer-->
                </div>
                
                <!--end::Content-->
            </div>
            <!--end::Login-->
        </div>
        
        <!--end::Main-->
        <script src="<?php echo e(asset('backend')); ?>/assets/js/customs/login_page.js"></script>

        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo e(asset('backend')); ?>/assets/plugins/global/plugins.bundle.js?v=7.0.3"></script>
        <script src="<?php echo e(asset('backend')); ?>/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3"></script>
        <script src="<?php echo e(asset('backend')); ?>/assets/js/scripts.bundle.js?v=7.0.3"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="<?php echo e(asset('backend')); ?>/assets/js/pages/custom/login/login-general.js?v=7.0.3"></script>

        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!--end::Page Scripts-->
        
    </body>
    <!--end::Body-->
</html>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/auth/login.blade.php ENDPATH**/ ?>