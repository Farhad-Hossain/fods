<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul style="list-style-type: none;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="list-style-type: none;"><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/message/emergency_form_validation.blade.php ENDPATH**/ ?>