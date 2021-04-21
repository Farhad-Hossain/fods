<?php if(session()->has('message')): ?>
    <div class="alert alert-<?php echo e(session()->pull('type')); ?>" id="report-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <?php echo e(session()->pull('message')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p> * <?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/message/flash_message.blade.php ENDPATH**/ ?>