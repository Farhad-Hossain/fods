@extends('frontend.master', ['title'=>'Become a partner'])
@section('main_content')

    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                        <h3>Partner with us</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Partner with us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->
    <!--partner-with-us start-->
    <section class="how-to-orders">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="new-heading">
                        <h1> Partner With Us</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="about-text1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique non est semper commodo. Cras semper nibh nibh.</p>
                    </div>
                </div>
            </div>
            <div class="order-steps">
                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="for-restaurant">
                            <img src="{!! asset('frontend/images/') !!}/partner-with-us/icon-1.svg" alt="">
                            <h4>For Restaurant</h4>
                            <p>Praesent rhoncus urna nec justo suscipit, id congue justo dictum.</p>
                            <a href="{!! route('frontend.add-restaurant') !!}" class="partner-btn1 btn-link">Add Restaurant</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="for-restaurant">
                            <img src="{!! asset('frontend/images/') !!}/partner-with-us/icon-2.svg" alt="">
                            <h4>For Driver</h4>
                            <p>Praesent rhoncus urna nec justo suscipit, id congue justo dictum.</p>
                            <a href="{{ route('frontend.add-driver') }}" class="partner-btn1 btn-link">Add Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="natto-business">
                        <div class="new-heading">
                            <h1> <span class="text-danger">{{$gd['globals']->app_name}}</span> for Business</h1>
                        </div>
                        <div class="video-9 b-top b-bottom">
                            <div class="top-img">
                                <div class="bg-gradient"></div>
                                <img src="{!! asset('frontend/images/') !!}/partner-with-us/video-img.jpg" alt="">
                                <div class="middle">
                                    <a href="#" data-toggle="modal" data-target="#videoModal" ><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                </div>
                                <div class="modal fade " id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <div>
                                                    <iframe src="https://www.youtube.com/embed/6CFJhTKcGJ4" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--partner-with-us end-->
    <!--over-15000-restaurants-start-->
    <section class="over-restaurants">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="restaurants-links">
                        <h1>Choose From Over 15,000 Restaurants</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam augue justo, euismod at purus quis, dictum iaculis lorem. Sed dictum, dolor sit amet feugiat posuere, ante arcu iaculis tortor</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="view-restaurants">
                        <a href="partners.html" class="m-btn r-btn-link">View Restaurants</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--over-15000-restaurants end-->
@endsection
