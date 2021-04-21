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
                    <h3 class="card-label"><?php echo __('order.order_list'); ?></h3>
                </div>
                <div class="card-toolbar">
                    
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo __('order.order_id'); ?></th>
                            <th><?php echo __('order.customer_name'); ?></th>
                            <th><?php echo __('order.payable_amount'); ?></th>
                            <th><?php echo __('order.delivery_address'); ?></th>
                            <th><?php echo __('common.status'); ?></th>
                            <th><?php echo __('common.action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo $loop->iteration; ?></td>
                            <td><?php echo $order->order_id; ?></td>
                            <td><?php echo $order->user->name; ?></td>
                            <td><?php echo $order->payable_amount; ?></td>
                            <td><?php echo $order->cityArea->area_name ?? ''; ?>  <?php echo $order->delivery_address; ?></td>
                            <td>
                                <b class="text-primary">
                                    <?php if( $order->order_status == 1 ): ?> 
                                        Order Recieved
                                    <?php elseif( $order->order_status == 2 ): ?>
                                        Processing
                                    <?php elseif( $order->order_status == 3 ): ?>
                                        Delivered
                                    <?php endif; ?>
                                </b>
                                <b class="badge badge-primary status_change_btn" oid="<?php echo $order->id; ?>" status_name="<?php echo $order->status->status_name; ?>" style="cursor: pointer;">
                                    Change
                                </b>
                            </td>
                            <td>
                                <a href="<?php echo route('backend.order.details', $order->id); ?>">
                                    <i class="fas fa-border-none text-primary mr-2"></i>
                                </a>
                                <a href="javascript:;" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="<?php echo route('backend.order.delete', $order->id); ?>" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </a>
                                <a href="javascript:;" onclick="rise_assign_driver_modal(
                                <?php echo $order->id; ?>

                                )">Assign Driver</a>
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

<?php $__env->startSection('modals'); ?>
    <!-- Payment Status modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="payment_status_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Payment Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo route('backend.order.change_payment_status'); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="payment_order_id" value="">
                        <label class="radio radio-primary">
                            <input type="radio" checked="" name="payment_status" value="0" /> Pending
                            <span></span>
                        </label>
                        <br />
                        <br />
                        <label class="radio radio-primary">
                            <input type="radio" checked="unchecked" name="payment_status" value="1"/> Paid
                            <span></span>
                        </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Sattus Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="status_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo route('backend.order.change_status'); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="order_id" value="">
                        <select class="form-control" name="order_status">
                            <option value="1">Order recieved</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Asign driver modal  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="assign_driver_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign a driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo route('backend.order.assign_driver'); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="order_id" value="">
                        <select class="form-control selectpicker" data-size="7" data-live-search="true" name="driver_id" required>
                            <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <option value="<?php echo $driver->id; ?>"><?php echo $driver->user->name; ?> - <?php echo $driver->phone; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Appoint</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom_script'); ?>
    <script type="text/javascript">
        function rise_assign_driver_modal(order_id)
        {
            $("#assign_driver_modal input[name='order_id']").val(order_id);
            $("#assign_driver_modal").modal();
        }
    </script>
    <script src="<?php echo asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js'); ?>"></script>
    <script src="<?php echo asset('frontend'); ?>/js/custom/weekedpicker.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/datatable.js"></script>
    <script src="<?php echo e(asset('backend')); ?>/assets/js/customs/orders_list.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', ['title'=>'Orders'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/pages/orders/list.blade.php ENDPATH**/ ?>