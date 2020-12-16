<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    @include('backend.partials._head')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading aside-minimize">
<!--begin::Main-->
<!--begin::Header Mobile-->
    @include('backend.partials._mobile_header')
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @if(Auth::user()->role == 0)
            @include('backend.partials._aside_bar')
        @endif
        @if(Auth::user()->role == 1)
            @include('backend.restaurant.partials._aside_bar')
        @endif
        @if(Auth::user()->role == 2)
            @include('backend.driver.partials._aside_bar')
        @endif
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->
                            @include('backend.partials._header_nav')
                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    @include('backend.partials._top_toolbar')
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                @include('backend.partials._sub_header')
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->

                    @yield('main_content')

                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                @include('backend.partials._footer')
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    @include('backend.partials._header_user_profile')
    <!--end::Content-->
</div>
<!-- end::User Panel-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
</div>
<!--end::Scrolltop-->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<!--end::Sticky Toolbar-->
@yield('modals')

<div class="modal" id="img_cutting_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Area ( Use wheel to zoom in & out )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="d-none img-container" style="border-right:1px solid #ddd;">
                    <div id="image-preview"></div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" id="crop_btn">Crop</button>
            </div>
            
        </div>
    </div>
</div>
@include('backend.partials._scripts')

<script src="{{asset('backend/assets/js/pages/features/miscellaneous/croppie.min.js')}}"></script>

    <script>
        $(document).ready(function(){
          $image_crop = $('#image-preview').croppie({
            showZoomer: true,
            viewport:{
              width:550,
              height:350,
              type:'square'
            },
            boundary:{
              width:600,
              height:400,
            }
          });

          $('.upload_image').change(function( ){

            field_name = $(this).attr('target');
            $("#crop_btn").attr('target', field_name);

            $(".img-container").removeClass('d-none');
            var reader = new FileReader();

            reader.onload = function(event){
              $image_crop.croppie('bind', {
                url:event.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
            }
            reader.readAsDataURL(this.files[0]);
            
            $("#img_cutting_modal").modal();

          });

          $('#crop_btn').click(function(event){

            var tr = $(this).attr('target');

            $image_crop.croppie('result', {
              type:'canvas',
              size:'viewport'
            }).then(function(response){
              var _token = $('input[name=_token]').val();
              
              $("input[name="+tr+"]").val(response);
            });
          });
          
        });  
    </script>

</body>
<!--end::Body-->
</html>
