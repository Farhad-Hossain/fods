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
                    <h3 class="card-label"><?php echo __('backend_menus.food_list'); ?></h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Export</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav flex-column nav-hover">
                                <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-print"></i>
                                        <span class="nav-text">Print</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-copy"></i>
                                        <span class="nav-text">Copy</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-excel-o"></i>
                                        <span class="nav-text">Excel</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-text-o"></i>
                                        <span class="nav-text">CSV</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-pdf-o"></i>
                                        <span class="nav-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="<?php echo route('backend.restAdmin.food.add'); ?>" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>New Record</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Restaurant</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th><?php echo e(__('driver_list.action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($food->food_name); ?></td>
                            <td><?php echo e($food->restaurant->name); ?></td>
                            <td><?php echo e($food->foodCategory->name); ?></td>
                            <td><?php echo e($food->price); ?></td>
                            <td><?php echo e($food->discount_price); ?></td>
                            <?php if( $food->status == 1 ): ?>
                                <td><b class="text-success">Active</b></td>
                            <?php else: ?>
                                <td><b class="text-danger">Deleted</b></td>
                            <?php endif; ?>
                            <?php if($food->featured == 1): ?>
                                <td><b class="text-success">Yes</b></td>
                            <?php else: ?>
                                <td><b class="text-danger">No</b></td>
                            <?php endif; ?>
                            
                            <td>
                                <a href="<?php echo e(route('backend.restAdmin.food.edit_form', $food->id)); ?>" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="<?php echo route('backend.restAdmin.food.delete', $food->id); ?>" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!--end: Datatable-->
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

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/restaurant/pages/food/food_list.blade.php ENDPATH**/ ?>