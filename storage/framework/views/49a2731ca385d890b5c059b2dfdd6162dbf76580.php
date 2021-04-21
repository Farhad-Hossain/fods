<?php $__env->startSection('custom_style'); ?>
    <link href="<?php echo e(asset('backend')); ?>/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <div class="container-fluid">
        <?php echo $__env->make('backend.message.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">Restaurants</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <?php if( \App\Helpers\Helper::haveAccess('rest_add') ): ?>
                    <a href="<?php echo route('backend.restaurant.add'); ?>" class="btn btn-primary font-weight-bolder">
                        <i class="la la-plus"></i>Add restaurant
                    </a>
                    <?php endif; ?>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <?php echo $__env->make('backend.inc.table.restaurants', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <!--end::Card-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_script'); ?>
    <script src="<?php echo e(asset('backend')); ?>/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/datatable.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', ['title'=>'Restaurants List'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/pages/restaurants/list.blade.php ENDPATH**/ ?>