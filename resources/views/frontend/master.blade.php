<!DOCTYPE html>
<html lang="en">

@include('frontend.partials._head')

<body>
<!--header start-->
<header id="header" class="default">

    @include('frontend.partials._top_header')

    @include('frontend.partials._menu')

</header>
<!--header end-->

@yield('main_content')

<!--download-link end-->
<!--footer start-->
@include('frontend.partials._footer')
<!--footer end-->
<input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">
<!--Bootstrap core JavaScript-->
<script src="{!! asset('frontend/vendor/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!--Core plugin JavaScript-->
<script src="{!! asset('frontend/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
<!--Assect scripts for this page-->
<script src="{!! asset('frontend/vendor/OwlCarousel/owl.carousel.js') !!}"></script>
<script src="{{asset('frontend')}}/assets/owlcarousel/owl.carousel.js"></script>
<script src="{!! asset('frontend/js/owlslider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/plugins/growl-alert/javascripts/jquery.growl.js') !!}"></script>

@yield('custom_script')

<script type="text/javascript">
    function addToCart(food_id) {
        let extra_food = [];
        $("input[name=extra_food]").each( function () {
            if ($(this).is(':checked')) {
                extra_food.push($(this).val());
            }
        });

        let csrf_token = $("#_token").val();
        let food_quantity = $("#qty_input").val();
        let post_url = "{!! route('frontend.cart.add') !!}";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token, extra_food: extra_food, food_id: food_id, food_quantity: food_quantity},
            success: function( data ) {
                // if (data.status !== 200) {
                //     $.growl.notice({ title: "Success", message: data.message });
                // } else {
                getTopCartContent();
                alert(data.message);
                // $.growl.notice({ title: "Success", message: "Food Added Successfully!" });
                // }
            }
        });
    }
    function getTopCartContent() {
        let csrf_token = $("#_token").val();
        let post_url = "{!! route('frontend.cart.getContent') !!}";
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
        let csrf_token = $("#_token").val();
        let post_url = "{!! route('frontend.cart.removeContent') !!}";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token, id: id, extra: extra},
            success: function( data ) {
                getTopCartContent();
                alert("Food Removed !");
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
</body>

</html>
