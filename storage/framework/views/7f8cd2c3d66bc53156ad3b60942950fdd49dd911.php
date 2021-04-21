<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo __('rest_list.name'); ?></th>
            <th><?php echo __('rest_list.owner'); ?></th>
            <th><?php echo __('rest_list.city'); ?></th>
            <th><?php echo __('rest_list.phone'); ?></th>
            <th><?php echo __('rest_list.address'); ?></th>
            <th><?php echo __('rest_list.open_status'); ?></th>
            <th><?php echo __('rest_list.delivery_charge'); ?></th>
            <th><?php echo __('rest_list.systmem_commision'); ?></th>
            <th><?php echo __('rest_list.payment_method'); ?></th>
            
            <?php if( \App\Helpers\Helper::haveAccess('rest_edit') ): ?>
                <th><?php echo __('rest_list.action'); ?></th>
            <?php endif; ?>
            
            

        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $rs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $loop->iteration; ?></td>

            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->owner['name']; ?></td>
            <td><?php echo $r->restCity->name; ?></td>
            <td><?php echo $r->phone; ?></td>
            <td><?php echo $r->address; ?></td>
            <td><?php echo ($r->open_status == 1) ? 'Opened' : 'Closed'; ?></td>
            <td><?php echo $r->delivery_charge; ?></td>
            <td><?php echo $r->selling_percentage; ?></td>
            <td><?php echo ($r->payment_method==1) ? 'Cash Only' : 'Card Only'; ?></td>
            <?php if( \App\Helpers\Helper::haveAccess('rest_edit') ): ?>
            <td>
                <a href="<?php echo e(route('backend.restaurant.edit', $r->id)); ?>" class="text-primary mr-2">
                    <i class="far fa-edit text-primary"></i>
                </a>
                <a href="<?php echo route('backend.restaurant.delete', $r->id); ?>" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                    <i class="far fa-trash-alt text-danger"></i>
                </a>
            </td>
            <?php endif; ?>
            
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<!--end: Datatable-->
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/inc/table/restaurants.blade.php ENDPATH**/ ?>