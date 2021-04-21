<footer class="footer">
    <div class="subscribe-now line">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 col-md-6">
                    <div class="subscribe-newsletter">
                        <div class="sub-text">
                            <p>Connect with us for update and offers.</p>
                        </div>
                        <form>
                            <input class="input-subscribe" name="newsletter" type="text" placeholder="Enter your email address">
                            <div class="subscribe-btn">
                                <div class="s-n-btn">
                                    <button class="newsletter-btn btn-link">Subscribe Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="language">
                        <form method="post" enctype="multipart/form-data" id="form-language">
                            <div class="btn-group open">
                                <button class="lang-btn l-btn-link dropdown-toggle-no-caret" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fas fa-globe"></i><span class="hidden-xs">English</span><i class="fas fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:;">English</a></li>
                                    <li><a href="javascript:;">Spanish</a></li>
                                    <li><a href="javascript:;">Hindi</a></li>
                                    <li><a href="javascript:;">Punjabi</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="img-title">
                    <a href="index.html"><img src="<?php echo e(asset('uploads')); ?>/logo/<?php echo e($gd['globals']->app_logo); ?>" class="rounded" alt="" style="max-width: 100%; max-height: 70px;"></a>
                </div>
                <p><?php echo e($gd['globals']->short_description); ?></p>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="link-title">
                    <h4>About <?php echo e($gd['globals']->app_name); ?></h4>
                    <ul class="links">
                        <li><a href="<?php echo e(route('frontend.about-us')); ?>">About Us</a></li>
                        <li><a href="<?php echo e(route('frontend.add-driver')); ?>">Careers</a></li>
                        <li><a href="<?php echo e(route('frontend.blog.our-blogs')); ?>">Blog</a></li>
                        <li><a href="#">Developers</a></li>
                        <li><a href="#">Mobile Apps</a></li>
                        <li><a href="<?php echo e(route('frontend.contact-us')); ?>">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="link-title">
                    <h4>Business</h4>
                    <ul class="links">
                        <li><a href="<?php echo e(route('frontend.add-restaurant')); ?>">Add a Restaurant</a></li>
                        <li><a href="#">Buniess Order Guidelines</a></li>
                        <li><a href="<?php echo e(route('frontend.cart.checkout')); ?>">Orders</a></li>
                        <li><a href="#">Book</a></li>
                        <li><a href="#">Trace</a></li>
                        <li><a href="#">Advertise</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="link-title">
                    <h4>Partner With Us</h4>
                    <ul class="links">
                        <li><a href="<?php echo e(route('frontend.add-restaurant')); ?>">For Restaurants</a></li>
                        <li><a href="<?php echo e(route('frontend.add-driver')); ?>">For Driver</a></li>
                    </ul>
                    <div class="social-btns">
                        <a href="<?php echo e($gd['globals']->facebook); ?>"><div class="social-btn soc-btn"><i class="fab fa-facebook-f"></i></div></a>
                        <a href="<?php echo e($gd['globals']->twitter); ?>"><div class="social-btn soc-btn"><i class="fab fa-twitter"></i></div></a>
                        <a href="<?php echo e($gd['globals']->instragram); ?>"><div class="social-btn soc-btn"><i class="fab fa-instagram"></i></div></a>
                        <a href="<?php echo e($gd['globals']->linkedin); ?>"><div class="social-btn soc-btn"><i class="fab fa-linkedin-in"></i></div></a>
                        <a href="<?php echo e($gd['globals']->youtube); ?>"><div class="social-btn soc-btn"><i class="fab fa-youtube"></i></div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="privacy-cards">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="privacy-terms">
                        <ul>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cards">
                        <img src="<?php echo asset('frontend/images/'); ?>/cards.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="copyright-text">
                        <i class="far fa-copyright"></i>Copyright <?php echo e(date('Y')); ?> <a href="<?php echo e(route('frontend.home')); ?>"><?php echo e($gd['globals']->app_name); ?></a> by Gono Tech. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal" id="cartContentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
                <p class="text-center">Your Busket</p>
            </div>

            <div class="modal-body" id="c_contents">
                
            </div>
            
            <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Continue Shoping</button>
                <a href="<?php echo route('frontend.cart.checkout'); ?>">
                    <button class="btn btn-primary m-0">View Checkout</button>
                </a>
            </div>
            
        </div>
    </div>
</div>

<?php echo $__env->yieldContent('modals'); ?>



<?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/partials/_footer.blade.php ENDPATH**/ ?>