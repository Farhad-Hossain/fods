<?php $__env->startSection('custom_style'); ?>
    <link href="<?php echo asset('backend/assets/css/plugin/croppie/croppie.css'); ?>" rel="stylesheet" type="text/css" />
    <style>
        #previewimage {
            height: 350px;
            width : 100% !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    
    <?php if($errors->hasAny()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="text-danger"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <!--BEGIN::Title bar-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>Register</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="<?php echo route('frontend.home'); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END::Title bar-->
    <!--BEGIN::Add Driver-->
    <section class="add-restaurant">
        <?php echo $__env->make('backend.message.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('frontend.customer-register')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="login-container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="login-form">
                                        <div class="create-text mt-4"><h4>Create Account and Get your Food</h4></div>
                                        <div class="form-group">
                                            <input type="text" class="video-form" name="full_name" value="<?php echo old('full_name'); ?>" id="full_name" placeholder="Enter Full Name" required>
                                            <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="video-form" name="email" value="<?php echo old('email'); ?>" id="email" placeholder="Enter Email Address" required>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="video-form" name="phone_number" value="<?php echo old('phone_number'); ?>" id="phone_number" placeholder="Enter Phone Number" required>
                                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <select class="video-form" name="city_id" required>
                                                <option>Select your city</option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="video-form" name="password" id="password" placeholder="Enter Password" required>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group">
                                                <div class="col-md-4 d-none" id="img_container" style="border-right:1px solid #ddd;">
                                                    <div id="image-preview"></div>
                                                </div>
                                                <div class="custom-file">
                                                        <input type="file"  name="customer_image" id="customer_image" class="image custom-file-input image">
                                                    <label class="custom-file-label" for="customer_image">Your Image</label>
                                                    <input type="hidden" id="customer_photo" name="customer_photo" value="" required>
                                                </div>
                                            <?php $__errorArgs = ['customer_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>The place where we will deliver a product for you</label>
                                            <textarea name="default_delivery_address" class="form-control"></textarea>
                                            <?php $__errorArgs = ['default_delivery_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="signup-checkbox text-left">
                                            <input type="checkbox" id="c1" name="cb" required>
                                            <label for="c1">I agree to GonoTech's <span>Terms of Service, Policy</span>and<span>Content Policies</span>.</label>
                                        </div>
                                        <button type="submit" class="login-btn btn-link" id="register_btn">Register Now</button>
                                        <div class="forgot-password">
                                            <p>If you have an account?<a href="<?php echo route('login'); ?>"><span style="color:#ffa803;"> - Login Now</span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!--END::Add-Driver-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_script'); ?>
    <script src="<?php echo e(asset('backend/assets/js/pages/features/miscellaneous/croppie.min.js')); ?>"></script>
    <script>
    $(document).ready(function(){
      $image_crop = $('#image-preview').croppie({
        enableExif:true,
        viewport:{
          width:200,
          height:200,
          type:'square'
        },
        boundary:{
          width:250,
          height:250
        }
      });

      $('#customer_image').change(function(){
        $("#img_container").removeClass('d-none');
        var reader = new FileReader();

        reader.onload = function(event){
          $image_crop.croppie('bind', {
            url:event.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
      });

      $('#register_btn').click(function(event){
        $image_crop.croppie('result', {
          type:'canvas',
          size:'viewport'
        }).then(function(response){
          var _token = $('input[name=_token]').val();
            $("#customer_photo").val(response);
        });
      });
      
    });  
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', ['title'=>'Register Customer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/pages/customer-register.blade.php ENDPATH**/ ?>