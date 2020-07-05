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
<script src="{!! asset('frontend/js/owlslider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/frontend/plugins/growl-alert/javascripts/jquery.growl.js') !!}"></script>

@yield('custom_script')

<script>
    function addToCart(food_id) {
        let csrf_token = $("#_token").val();
        let food_quantity = $("#qty_input").val();
        let post_url = "{!! route('frontend.cart.add') !!}";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token, food_id: food_id, food_quantity: food_quantity},
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

    function removeContent(id) {
        let csrf_token = $("#_token").val();
        let post_url = "{!! route('frontend.cart.removeContent') !!}";
        $.ajax({
            type: "POST",
            url: post_url,
            data: {_token: csrf_token, id: id},
            success: function( data ) {
                getTopCartContent();
                alert("Food Removed !");
            }
        });
    }

    $(document).ready(function () {
        getTopCartContent();
    });
</script>
</body>

</html>
