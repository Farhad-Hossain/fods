<a href="#" class="dropdown-toggle-no-caret" id="orderDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-shopping-cart"></i>Food Orders <span class="badge badge-secondary"><?php echo $contents->count() + $extra_contents->count(); ?></span>
</a>
<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="orderDropdown" id="mini_cart_dropdown">
    <?php if(!empty($contents)): ?>
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="dropdown-item content justify-content-between">
                <a href="#"><?php echo $content->name; ?></a> (<?php echo $content->qty; ?>) &nbsp;&nbsp;
                <button onclick="removeContent(<?php echo $content->id; ?>), true" class="badge badge-primary">x</button>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(!empty($extra_contents)): ?>
        <?php $__currentLoopData = $extra_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="dropdown-item content justify-content-between">
                <a href="#" class=""><?php echo $content->name; ?></a> (<?php echo $content->qty; ?>) &nbsp;&nbsp;
                <button onclick="removeContent(<?php echo $content->id; ?>, true)" class="badge badge-primary">x</button>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
        <a class="dropdown-item" href="<?php echo route('frontend.cart.checkout'); ?>">
            <button class="btn btn-primary m-0">View Checkout</button>
        </a>
</ul>

<?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/partials/_top_mini_cart_content.blade.php ENDPATH**/ ?>