<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
    <!--begin::Copyright-->
    <!--begin::Nav-->
    <div class="nav nav-dark">
        <a href="<?php echo URL::to('/'); ?>" target="_blank" class="nav-link pl-0 pr-5"><?php echo date('Y'); ?> &copy; <?php echo e($gd['globals']->short_description); ?></a>
    </div>
    <!--end::Nav-->
    <div class="text-dark order-2 order-md-1">
        <a href="javascript:;" target="_blank" class="text-dark-75 text-hover-primary">Version <?php echo $gd['globals']->current_version; ?></a>
    </div>
    <!--end::Copyright-->
</div>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/backend/partials/_footer.blade.php ENDPATH**/ ?>