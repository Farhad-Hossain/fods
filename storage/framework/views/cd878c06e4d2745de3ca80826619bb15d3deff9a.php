<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="topbar-left text-center text-md-left">
                    <ul class="list-inline">
                        <li> <a href="<?php echo e(route('frontend.contact-us')); ?>"> Contact </a></li>
                        <li> <a href="<?php echo e(route('frontend.about-us')); ?>"> About Us </a></li>
                        <li> <a href="<?php echo e(route('frontend.blog.our-blogs')); ?>"> Blog </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="topbar-right text-center text-md-right">
                    <ul class="list-inline">


                        <li class="nav-item dropdown" id="min_car_content">
                            <a href="#" class="dropdown-toggle-no-caret" id="orderDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>Food Orders<span class="badge badge-secondary">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="orderDropdown" id="mini_cart_dropdown">

                            </div>
                        </li>

                        <?php if(Auth::check()): ?>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle-no-caret" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <?php echo Auth::user()->name; ?>  <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('frontend.myProfile')); ?>"> My Profile</a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Logout</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>

                            </div>
                        </li>
                        <?php else: ?>
                            <li class="nav-item" id="min_car_content">
                                <a href="<?php echo route('login'); ?>" class="dropdown-toggle-no-caret" id="">
                                    <i class="fas fa-user-circle"></i>Login
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/partials/_top_header.blade.php ENDPATH**/ ?>