<?php if(!empty($contents)): ?>
    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="m-2 p-2">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($content->options['food_info']->image1 ?? ''); ?>" class="w-100" style="width: 100px; height: 80px;">
                </div>
                <div class="col-sm-12 col-md-8">
                    <h4><?php echo e($content->name); ?></h4>
                    <p><?php echo e($content->price); ?> / Per unit -- <?php echo e($content->qty); ?> piece</p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(!empty($extra_contents)): ?>
    <?php $__currentLoopData = $extra_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="m-2 p-2">
            <p class="h4">Extra Foods</p>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img src="<?php echo e(asset('uploads')); ?>/<?php echo e($content->options['extra_food_info']->photo ?? ''); ?>" class="w-100" style="width: 100px; height: 80px;">
                </div>        
                <div class="col-sm-12 col-md-8">
                    <h4><?php echo e($content->name); ?></h4>
                    <p><?php echo e($content->price); ?> / Per unit -- <?php echo e($content->qty); ?> pieces</p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/partials/_cartModal.blade.php ENDPATH**/ ?>