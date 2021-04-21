<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th>#</th>
            <th>Promo Code</th>
            <th>Discount Price</th>
            <th>Applicable For</th>
            <th>Restaurants</th>
            <th>Limit</th>
            <th>Selling Count</th>
            <th>Available</th>
            <th>Valid From</th>
            <th>Valid Till</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $discount_coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($coupon->promo_code); ?></td>
                <td>
                    <b><?php echo e($coupon->discount_price); ?></b>
                    <?php if($coupon->promo_type==1): ?>
                        <b class="text-primary">(Flate rate)</b>
                    <?php else: ?>
                        <b class="text-primary">(Percentage)</b>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($coupon->applicable_for==1): ?>
                        All Users
                    <?php else: ?>
                        New Users
                    <?php endif; ?>
                </td>
                <td>
                    <?php $__currentLoopData = app(App\Helpers\Helper::class)->getRestaurantFromIds($coupon->restaurant_ids); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($restaurant->name); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td><?php echo e($coupon->promo_code_limit); ?></td>
                <td><?php echo e($coupon->selling_count); ?></td>
                <td><?php echo e($coupon->promo_code_limit-$coupon->selling_count); ?></td>
                <td>
                    <?php if( $coupon->valid_date_from == '2020-01-01' ): ?> 
                        <b class="bg-success text-light px-2 rounded">Always</b> 
                    <?php else: ?>
                        <b class="bg-success text-light px-2 rounded"><?php echo $coupon->valid_date_from; ?></b> 
                    <?php endif; ?>
                <td>
                    <?php if($coupon->valid_date_to < now()): ?>
                        <?php if( $coupon->valid_date_to == '2020-01-01' ): ?> 
                            <b class="bg-success text-light px-2 rounded">Always</b>  
                        <?php else: ?>
                            <b class="bg-danger text-light px-2 rounded"><?php echo e($coupon->valid_date_to); ?></b>
                        <?php endif; ?>
                    <?php else: ?>
                        <b class="bg-success text-light px-2 rounded"><?php echo e($coupon->valid_date_to); ?></b>
                    <?php endif; ?>
                </td>
                <td><?php echo $coupon->created_at; ?></td>
                <td>
                    <a href="<?php echo e(route('backend.settings.edit_coupon_view', $coupon->id)); ?>" class="text-primary mr-2">
                        <i class="far fa-edit text-primary"></i>
                    </a>
                    <a href="<?php echo e(route('backend.settings.delete_coupon_submit', base64_encode($coupon->id) )); ?>" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                        <i class="far fa-trash-alt text-danger"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<!--end: Datatable-->
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/inc/table/coupons.blade.php ENDPATH**/ ?>