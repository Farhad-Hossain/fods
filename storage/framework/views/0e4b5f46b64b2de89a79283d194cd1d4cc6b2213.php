<section class="block-preview">
    <div class="cover-banner" style="background-image: url(frontend/images/homepage/banner.jpg)"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="left-text-b">
                    <h1 class="title">Choose, Order and Checkout</h1>
                    <h6 class="exeption">Specify your address to suggest you the fast delivery</h6>
                    <p>Get our services from 24 hours.</p>
                    <a class="bnr-btn btn-link" href="<?php echo e(route('frontend.food.allFoods')); ?>">Go To Meal</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <form action="<?php echo e(route('frontend.food.searchByLocationAndRestaurant')); ?>" method="GET">
                    <div class="form-box">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                        </div>
                        <input  class="find-address skills" name="location" type="text" placeholder="Your City"/>
                        
                        <div class="input-group-prepend">
                            <div class="input-group-text-1"><i class="fas fa-utensils"></i></div>
                        </div>
                        <input  class="find-resto skills" name="restaurant" type="text" placeholder="Choose restaurant"/>
                        <button class="search-btn btn-link" type="submit">Find Food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/partials/_banner.blade.php ENDPATH**/ ?>