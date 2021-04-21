<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Get your favaourite foods from home">
    <meta name="author" content="">

    <!-- Favicon -->
    <link href="{!! asset('uploads') !!}/logo/{{$gd['globals']->website_logo}}" rel="shortcut icon" type="image/x-icon"/>

    <!-- <title>{{$gd['globals']->app_name}} | {{ $title ?? '' }} </title> -->
    <title>My Title</title>

    <!-- Bootstrap core CSS-->
    <link href="{!! asset('frontend/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/responsive.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/mega.menu.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/thumbnail.slider.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/bootstrap-select.css') !!}" rel="stylesheet">
    <link href="{{  asset('frontend')}}/css/datepicker.css" rel="stylesheet">
    <link href="{!! asset('frontend/css/owlslider.css') !!}" rel="stylesheet">
    
    <!-- Owl Carousel for this template-->
    
    <link href="{!! asset('frontend/vendor/OwlCarousel/assets/owl.carousel.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/vendor/OwlCarousel/assets/owl.theme.default.min.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('assets/frontend/plugins/growl-alert/stylesheets/jquery.growl.css') !!}">
    <!-- Fontawesome styles for this template-->
    <link href="{!! asset('frontend/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{!! asset('frontend/css/custom/style.css') !!}">

    <!-- Croppie style -->
    <link href="{!! asset('backend/assets/css/plugin/croppie/croppie.css') !!}" rel="stylesheet" type="text/css" />

    @yield('custom_style')
</head>
