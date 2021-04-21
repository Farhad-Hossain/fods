<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('frontend.partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<!--header start-->
<header id="header" class="default">
    

    <?php echo $__env->make('frontend.partials._top_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.partials._menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</header>
<!--header end-->

<?php echo $__env->yieldContent('main_content'); ?>

<!--download-link end-->
<!--footer start-->







<?php echo $__env->make('frontend.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--footer end-->
<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">

<!--Bootstrap core JavaScript-->
<script src="<?php echo asset('frontend/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


<script src="<?php echo asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!--Core plugin JavaScript-->
<script src="<?php echo asset('frontend/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js'); ?>"></script>
<script src="<?php echo asset('frontend'); ?>/js/custom/weekedpicker.js"></script>

<?php echo $__env->yieldContent('custom_script'); ?>


<script type="text/javascript">
    

    function addToCart(food_id) {

        let extra_food = [];
        $("input[name=extra_food]").each( function () {
            if ($(this).is(':checked')) {
                extra_food.push({
                    'id': $(this).val(),
                    'count': parseInt( $( ".ef_qty_"+$(this).val() ).val() ),
                });
            }
        });
        
        let csrf_token = $("#_token").val();
        let food_quantity = $("#qty_input").val();
        let post_url = "<?php echo route('frontend.cart.add'); ?>";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token, extra_food: extra_food, food_id: food_id, food_quantity: food_quantity},
            success: function( data ) {
                // if (data.status !== 200) {
                //     $.growl.notice({ title: "Success", message: data.message });
                // } else {
                getTopCartContent();
                setCartContentToModal();
                // swal({
                //     text: data.message
                // });
                $("#cartContentModal").modal();
                // $.growl.notice({ title: "Success", message: "Food Added Successfully!" });
                // }
            }
        });
    }

    function setCartContentToModal()
    {
        let csrf_token = $("#_token").val();
        let post_url = "<?php echo route('frontend.cart.setCartContentToModal'); ?>";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token},
            success: function( data ) {
                $("#c_contents").html(data);
            }
        });
    }

    function getTopCartContent() {
        let csrf_token = $("#_token").val();
        let post_url = "<?php echo route('frontend.cart.getContent'); ?>";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token},
            success: function( data ) {
                $("#min_car_content").html(data);
            }
        });
    }
    function removeContent(id, extra = false) {
        if ( !confirm('Are you sure want to delete ?') ) {
            return 0;
        }
        let csrf_token = $("#_token").val();
        let post_url = "<?php echo route('frontend.cart.removeContent'); ?>";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token, id: id, extra: extra},
            success: function( data ) {
                getTopCartContent();
                alert("Food Removed !");
                window.location = window.location;
            }
        });
    }

    function calculateTotalAmountInFoodDetail() {
        let total_price = 0;
        $("input[name=extra_food]").each( function () {
            if ($(this).is(':checked')) {
                let ep_id = $(this).val();
                total_price += parseFloat($(".ep_"+ep_id).html());
            }
        });

        let food_quantity = parseFloat($("#qty_input").val());
        let food_price = parseFloat($(".food_price").html());
        let delivery_charge = parseFloat($(".food_delivery_charge").html());

        total_price = total_price + (food_quantity * food_price) + delivery_charge;


        $(".total-price p").html(total_price);
    }

    $(document).ready(function () {
        getTopCartContent();
        calculateTotalAmountInFoodDetail();
    });

</script>

<script>
    $(function(){
        $('.datepicker').datepicker();
    });
    </script>


</body>

</html>
<?php /**PATH /opt/lampp/htdocs/fods/resources/views/frontend/master.blade.php ENDPATH**/ ?>