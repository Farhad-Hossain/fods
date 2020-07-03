<base href="">
<meta charset="utf-8" />
<title>Metronic | {{ $title ?? '' }}</title>
<meta name="description" content="Updates and statistics" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{!! asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{!! asset('backend/assets/plugins/global/plugins.bundle.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('backend/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('backend/assets/css/style.bundle.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{!! asset('backend/assets/css/themes/layout/header/base/light.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('backend/assets/css/themes/layout/header/menu/light.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('backend/assets/css/themes/layout/brand/dark.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('backend/assets/css/themes/layout/aside/dark.css?v=7.0.3') !!}" rel="stylesheet" type="text/css" />
<!--end::Layout Themes-->
<link rel="shortcut icon" href="{!! asset('backend/assets/media/logos/favicon.ico') !!}" />

<link rel="stylesheet" href="{!! asset('assets/frontend/plugins/growl-alert/stylesheets/jquery.growl.css') !!}">

@yield('custom_style')