@extends('frontend.master', ['title'=>'Register Customer'])

@section('custom_style')
    <link href="{!! asset('backend/assets/css/plugin/croppie/croppie.css') !!}" rel="stylesheet" type="text/css" />
    <style>
        #previewimage {
            height: 350px;
            width : 100% !important;
        }
    </style>
@endsection

@section('main_content')
    
    @if($errors->hasAny())
        @foreach($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
    @endif

    <!--BEGIN::Title bar-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>Register</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="{!! route('frontend.home') !!}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END::Title bar-->
    <!--BEGIN::Add Driver-->
    <section class="add-restaurant">
        @include('backend.message.flash_message')
        <form action="{{ route('frontend.customer-register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <h1>Register Now</h1>
                        <div class="login-container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="login-form">
                                        <div class="login-logo">
                                            <a href="index.html">
                                                <img src="images/login-register/logo.svg" alt="">
                                            </a>
                                        </div>
                                        <div class="create-text"><h4>Create Your Account</h4></div>
                                        <div class="form-group">
                                            <input type="text" class="video-form" name="full_name" value="{!! old('full_name') !!}" id="full_name" placeholder="Enter Full Name" required>
                                            @error('full_name')
                                                <p class="text-danger">{!! $message !!}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="video-form" name="email" value="{!! old('email') !!}" id="email" placeholder="Enter Email Address" required>
                                            @error('email')
                                                <p class="text-danger">{!! $message !!}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="video-form" name="phone_number" value="{!! old('phone_number') !!}" id="phone_number" placeholder="Enter Phone Number" required>
                                            @error('phone_number')
                                                <p class="text-danger">{!! $message !!}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="video-form" name="password" id="password" placeholder="Enter Password" required>
                                            @error('password')
                                                <p class="text-danger">{!! $message !!}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                                <div class="col-md-4 d-none" id="img_container" style="border-right:1px solid #ddd;">
                                                    <div id="image-preview"></div>
                                                </div>
                                                <div class="custom-file">
                                                        <input type="file"  name="customer_image" id="customer_image" class="image custom-file-input image">
                                                    <label class="custom-file-label" for="customer_image">Your Image</label>
                                                    <input type="hidden" name="customer_photo">
                                                </div>
                                            @error('customer_image')
                                                <p class="text-danger">{!! $message !!}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>The place where we will deliver a product for you</label>
                                            <textarea name="default_delivery_address" class="form-control"></textarea>
                                            @error('default_delivery_address')
                                                <p class="text-danger">{!! $message !!}</p>
                                            @enderror
                                        </div>
                                        <div class="signup-checkbox text-left">
                                            <input type="checkbox" id="c1" name="cb" required>
                                            <label for="c1">I agree to GonoTech's <span>Terms of Service, Policy</span>and<span>Content Policies</span>.</label>
                                        </div>
                                        <button type="submit" class="login-btn btn-link" id="register_btn">Register Now</button>
                                        <div class="forgot-password">
                                            <p>If you have an account?<a href="#"><span style="color:#ffa803;"> - Login Now</span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!--END::Add-Driver-->
@endsection

@section('custom_script')
    <script src="{{asset('backend/assets/js/pages/features/miscellaneous/croppie.min.js')}}"></script>
    <script>
    $(document).ready(function(){
      $image_crop = $('#image-preview').croppie({
        enableExif:true,
        viewport:{
          width:200,
          height:200,
          type:'square'
        },
        boundary:{
          width:250,
          height:250
        }
      });

      $('#customer_image').change(function(){
        $("#img_container").removeClass('d-none');
        var reader = new FileReader();

        reader.onload = function(event){
          $image_crop.croppie('bind', {
            url:event.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
      });

      $('#register_btn').click(function(event){
        $image_crop.croppie('result', {
          type:'canvas',
          size:'viewport'
        }).then(function(response){
          var _token = $('input[name=_token]').val();
            $("#customer_photo").val(response);
        });
      });
      
    });  
    </script>
@endsection
