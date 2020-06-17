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

<!--Bootstrap core JavaScript-->
<script src="{!! asset('frontend/vendor/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!--Core plugin JavaScript-->
<script src="{!! asset('frontend/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
<!--Assect scripts for this page-->
<script src="{!! asset('frontend/vendor/OwlCarousel/owl.carousel.js') !!}"></script>
<script src="{!! asset('frontend/js/owlslider.js') !!}"></script>

</body>

</html>
