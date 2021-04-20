<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Favicon -->
    <link href="images/fav.png" rel="shortcut icon" type="image/x-icon"/>

    <title>Natto | Restaurant Detail View </title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset('frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/responsive.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/mega.menu.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/thumbnail.slider.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/datepicker.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/bootstrap-select.css" rel="stylesheet">

    <!-- Owl Carousel for this template-->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/owlcarousel/assets/owl.carousel.min.css"> 
    
    <!-- Fontawesome styles for this template-->
    <link href="{{asset('frontend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
</head>

<body>
    <header id="header" class="default">
        @include('frontend.partials._top_header')
        @include('frontend.partials._menu')
    </header>
    <!--header end-->

    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>Restaurant Detail View</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="partners.html">Partners</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Restaurant Detail View</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->   

    <section class="all-partners">          
        <div class="container">     
            <div class="row">                   
                <div class="col-lg-9 col-md-12">
                    <div id="sync1" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmyvirtual360.com%2Fwp-content%2Fuploads%2F2017%2F07%2Flive-demo.png&f=1&nofb=1" alt="">
                        </div>
                    </div>
                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{asset('uploads')}}/{{$restaurant->logo}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend')}}/images/restaurant-detail/thumbs/img-2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend')}}/images/restaurant-detail/thumbs/img-3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend')}}/images/restaurant-detail/thumbs/img-4.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend')}}/images/restaurant-detail/thumbs/img-5.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend')}}/images/restaurant-detail/thumbs/img-6.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend')}}/images/restaurant-detail/thumbs/img-7.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="images/restaurant-detail/thumbs/img-8.jpg" alt="">
                        </div>
                    </div>
                    <div class="profile-toolbar padding-b padding-t">
                        <div class="user-details">
                            <div class="user-picy">
                                <a href="javascript:;"><img src="" alt=""></a>
                            </div>
                            <div class="name-location">
                                <a href="javascript:;"><h4>{{$restaurant->owner->name}}</h4></a>
                                <p>Owner</p>
                            </div>
                        </div>
                        <div class="right-side-btns">
                            <div class="online-offline-2">
                                <p>
                                    <span class="span-1 active"><i class="fas fa-circle"></i></span>
                                    {{$open_status==1?'Opened':'Closed'}}
                                </p>
                            </div>
                            <a href="tel:{{$restaurant->phone}}" class="right-btn-c btn-link" title="Call Us"><i class="fas fa-phone"></i>Call Us</a>
                            <a href="#" class="right-btn-c btn-link" title="Order Now">Order Now</a>
                        </div>
                    </div>
                    <div class="resto-dt">
                        <div class="resto-detail">
                            <div class="resto-picy">
                                <a href="restaurant_detail.html"><img src="images/restaurant-detail/logo-10.jpg" alt=""></a>
                            </div>
                            <div class="name-location">
                                <a href="restaurant_detail.html"><h1>{{$restaurant->name}}</h1></a>
                                <p><span><i class="fas fa-map-marker-alt"></i></span>{{$restaurant->restCity->name}}, {{$restaurant->restCity->country->name}}</p>
                            </div>
                        </div>
                        <div class="right-side-btns">
                            <div class="bagde-dt">
                                <div class="partner-badge">
                                    Partner
                                </div>                                          
                            </div>
                            <div class="resto-review-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>                             
                                <span>4.5/5</span>                                  
                            </div>
                        </div>
                    </div>
                    <div class="published-like-comments">
                        <div class="published-time">
                            <span><i class="far fa-calendar-alt"></i> Member since {{substr($restaurant->created_at,0,10)}}</span>
                        </div>
                        <div class="like-comments">
                            <ul>
                                <li>
                                    <span class="views" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                        <i class="far fa-bookmark"></i>
                                        <ins>Bookmark</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="views" data-toggle="tooltip" data-placement="top" title="Add Reviews">
                                        <i class="fas fa-pencil-alt"></i>
                                        <ins>Add Reviews</ins>
                                    </span>
                                </li>
                                <li>
                                    <div class="btn-group social-share">
                                        <span class="dropdown-toggle-no-caret views" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="main" title="">
                                            <i class="fas fa-share-alt"></i>
                                            <ins>Share</ins></span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
                                            <a href="#"><i class="fab fa-twitter"></i>Twitter</a>                                   
                                            <a href="#"><i class="fab fa-google-plus-g"></i>Google+</a>                                 
                                            <a href="#"><i class="fab fa-instagram"></i>Instagram</a>                                   
                                            <a href="#"><i class="fab fa-pinterest-p"></i>Pinterest</a>                                 
                                            <a href="#"><i class="fab fa-linkedin-in"></i>LinkedIn</a>                                  
                                        </div>
                                    </div>                              
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="all-tabs">
                        <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#overview" class="nav-link active" data-toggle="tab">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a href="#order-online" class="nav-link" data-toggle="tab">Order Online</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reviews" class="nav-link" data-toggle="tab">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="#book-a-table" class="nav-link" data-toggle="tab">Book a Table</a>
                        </li>
                        <li class="nav-item">
                            <a href="#photos" class="nav-link" data-toggle="tab">Photos</a>
                        </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview">
                                <div class="restaurants-detail-bg">
                                    <h4>About Restaurant</h4>                               
                                    <div class="overview-details">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="flex-dt">   
                                                        <ul class="view-dt">
                                                            <li>Name</li>
                                                            <li>Owner</li>
                                                            <li>Phone Number</li>
                                                            <li>Email</li>
                                                            <li>Cuisines</li>
                                                            <li>Min. Delivery Charge</li>                                                       
                                                        </ul>
                                                        <ul class="view-dt">
                                                            <li>:</li>
                                                            <li>:</li>
                                                            <li>:</li>
                                                            <li>:</li>
                                                            <li>:</li>                                      
                                                            <li>:</li>                                      
                                                        </ul>
                                                        <ul class="view-dt-1">
                                                            <li>{{$restaurant->name}}</li>
                                                            <li>{{$restaurant->owner->name}}</li>
                                                            <li>{{$restaurant->phone}}</li>
                                                            <li>{{$restaurant->email}}</li>
                                                            <li>
                                                                @foreach($cuisines as $cuisine)
                                                                    @if($loop->last)
                                                                        {{$cuisine->name}}
                                                                    @else
                                                                        {{$cuisine->name}},
                                                                    @endif
                                                                @endforeach
                                                            </li>              
                                                            <li>{{$restaurant->delivery_charge}} $</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="flex-dt">   
                                                        <ul class="view-dt">
                                                            <li>Opening Hours</li>
                                                            <li>Status</li>
                                                            <li>Country</li>
                                                            <li>Address</li>
                                                            <li>Featured</li>                               
                                                        </ul>
                                                        <ul class="view-dt">
                                                            <li>:</li>
                                                            <li>:</li>
                                                            <li>:</li>
                                                            <li>:</li>
                                                            <li>:</li>              
                                                        </ul>
                                                        <ul class="view-dt-1">
                                                            <li>9Am to 12PM (Mon-Sun)</li>
                                                            <li>{{$restaurant->open_status==1?'Open':'Closed'}}</li>
                                                            <li>{{$restaurant->restCity->country->name}}</li>
                                                            <li><a href="#" class="direction">{{$restaurant->address}}</a></li>
                                                            <li>
                                                                @foreach($characteristics as $feature)
                                                                    {{ $loop->last?$feature->name:$feature->name.',' }}
                                                                @endforeach
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="restaurants-detail-bg">
                                    <h4>Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vehicula ut nisl id aliquam. Phasellus vestibulum ante eget aliquet sodales. Aliquam erat enim, venenatis eget fringilla ac, euismod ac sapien. Sed tincidunt diam eget orci finibus blandit. Sed eget interdum quam. Proin arcu dolor, eleifend ut commodo sed, accumsan et ipsum. Mauris laoreet bibendum dolor, at vestibulum neque facilisis sed. Donec a eros quam. Cras lobortis, nunc a dignissim maximus, leo nunc imperdiet tellus, sed viverra felis elit ac arcu. Sed et sapien venenatis leo ullamcorper finibus eu id lectus. Aliquam tristique pulvinar vehicula.</p>                                    
                                </div>
                                <div class="ads-offer">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="ads-offer-1" style="background-image: url(images/restaurant-detail/offer-bnnr-1.jpg)"></div>
                                                <div class="offer-bnnr-items">
                                                    <h1>10% off </h1>
                                                    <p>on all orders get the code : 156CD85</p>                                                 
                                                </div>
                                                <div class="offer-order">
                                                    <a href="#" class="offer-btn-1 btn-link" title="Order Now">Order Now </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                     
                            <div class="tab-pane" id="order-online">
                                <div class="restaurants-order-bg m-bottom">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="breakfast">
                                            <div class="all-meals-tab">
                                                <div class="all-meal-dt">
                                                    <div class="row">
                                                        @foreach($restaurant->foods as $food)
                                                            <div class="col-md-6 pm-right">
                                                                <div class="meals-dt">
                                                                    <div class="meal-list">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <img src="{{asset('uploads')}}/{{$food->image1}}" class="img-responsive" alt="image" title="image">
                                                                                <div class="caption-meal">
                                                                                    <a href="{{route('frontend.food.details',$food->id)}}">{{$food->food_name}}</h4></a>
                                                                                    <div class="star">
                                                                                        <i class="fas fa-star"></i>
                                                                                        <i class="fas fa-star"></i>
                                                                                        <i class="fas fa-star"></i>
                                                                                        <i class="fas fa-star"></i>
                                                                                        <i class="far fa-star"></i>
                                                                                        <span>4.5</span>   
                                                                                    </div>
                                                                                    <p>{{$food->price}}</p>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                </div>      
                            </div>
                            
                            <div class="tab-pane" id="reviews">
                                <div class="comment-post">
                                    <div class="post-items">
                                        <a href="my_dashboard.html">
                                        <div class="img-dp">
                                            <i class="fas fa-user"></i>
                                        </div>                                  
                                        </a>
                                        <div class="select-rating">
                                            <h4>Your Rating :</h4>
                                            <ul class="rating-stars">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <form>
                                            <textarea class="description-area" name="post" placeholder="Please describe the reason for your rating to help the restaurant (150 words)"></textarea>
                                            <input type="text" class="rating-input" name="search" placeholder="@ Tags with friends">                                            
                                        </form>
                                        <div class="add-image">
                                            <input type="file" id="file">
                                            <label for="file"><i class="far fa-image"></i> Add Photo</label>                                    
                                        </div>
                                        <div class="images">
                                            <div class="select-images">
                                                <ul >
                                                    <li class="image-select">
                                                        <img src="images/restaurant-detail/add-1.jpg" alt="">
                                                        <div class="close-icon">
                                                            <i class="fas fa-window-close"></i>                                                                                         
                                                        </div>
                                                    </li>
                                                    <li class="image-select">
                                                        <img src="images/restaurant-detail/add-2.jpg" alt="">
                                                        <div class="close-icon">
                                                            <i class="fas fa-window-close"></i>                                                                                         
                                                        </div>
                                                    </li>
                                                    <li class="image-select">
                                                        <img src="images/restaurant-detail/add-3.jpg" alt="">
                                                        <div class="close-icon">
                                                            <i class="fas fa-window-close"></i>                                                                                         
                                                        </div>
                                                    </li>
                                                </ul>   
                                                
                                            </div>
                                        </div>
                                        <div class="publish">                                                                                                       
                                            <form>
                                                <input class="rating-btn btn-link" type="submit" value="Publish Review">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="images/recipe-details/comment-5.png" alt=""></a>
                                            <h4> Joy Cutler</h4><br>
                                            <div class="rate-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>                             
                                                <span>4.5</span> 
                                            </div>
                                        </div>
                                        <div class="reply-time">                                            
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit amet efficitur quam aliquam non. Integer gravida ex quis lacinia consectetur.</p>
                                        </div>
                                        
                                    </div>
                                    <div class="review-tags">
                                        <p><ins>Tags :</ins><a href="#">Johnson,</a> <a href="#"> Jasica,</a><a href="#"> Joy William,</a> <a href="#"> Johnson,</a><a href="#"> Jass Singh,</a>&nbsp; <span> and</span>&nbsp; <a href="#">8 others</a></p>
                                    </div>
                                    <div class="post-images">
                                        <div class="select-images">
                                            <ul>
                                                <li class="image-select">
                                                    <img src="images/restaurant-detail/add-1.jpg" alt="">                                                       
                                                </li>
                                                <li class="image-select">
                                                    <img src="images/restaurant-detail/add-2.jpg" alt="">
                                                </li>
                                                <li class="image-select">
                                                    <img src="images/restaurant-detail/add-3.jpg" alt="">                                                       
                                                </li>
                                            </ul>                                                   
                                        </div>
                                    </div>
                                    <div class="like-comment-dt">
                                        <ul>
                                            <li>
                                                <span class="views" data-toggle="tooltip" data-placement="top" title="Likes">
                                                    <i class="fas fa-heart"></i>
                                                    <ins>Like 562</ins>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="views" data-toggle="tooltip" data-placement="top" title="Comments">
                                                    <i class="fas fa-comment-alt"></i>
                                                    <ins>Comments 01</ins>
                                                </span>
                                            </li>                                               
                                        </ul>
                                    </div>
                                    <div class="reply-review-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="images/recipe-details/reply-1.png" alt=""></a>
                                            <h4>Rock Smith</h4>
                                        </div>
                                        <div class="reply-time">                                
                                            <p><i class="far fa-clock"></i>2 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p> Thank you</p>
                                        </div>
                                        <div class="like-report">
                                        <ul>
                                            <li>
                                                <span class="views" data-toggle="tooltip" data-placement="top" title="Likes">
                                                    <i class="fas fa-heart"></i>
                                                    <ins>Like 1</ins>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="views" data-toggle="tooltip" data-placement="top" title="Comments">
                                                    <ins>Report</ins>
                                                </span>
                                            </li>                                               
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="reply-comment">
                                        <div class="post-items">                                            
                                            <div class="reply-dp">
                                                <a href="my_dashboard.html"><img src="images/recipe-details/reply-1.png" alt=""></a>
                                            </div>
                                            <form>
                                                <input type="text" class="comment-input" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post Comment">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="images/recipe-details/comment-4.png" alt=""></a>
                                            <h4> Rock Smith</h4><br>
                                            <div class="rate-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>                             
                                                <span>4.5</span> 
                                            </div>
                                        </div>
                                        <div class="reply-time">                                            
                                            <p><i class="far fa-clock"></i>13 hours ago</p>
                                        </div>
                                        <div class="comment-description">
                                            <p>Duis posuere justo neque, sit amet efficitur quam aliquam non. Integer gravida ex quis lacinia consectetur.</p>
                                        </div>
                                        
                                    </div>
                                    <div class="review-tags">
                                        <p><ins>Tags :</ins><a href="#">Johnson,</a> <a href="#"> Jasica,</a><a href="#"> Joy William,</a> <a href="#"> Johnson,</a><a href="#"> Jass Singh,</a>&nbsp; <span> and</span>&nbsp; <a href="#">8 others</a></p>
                                    </div>                          
                                    <div class="like-comment-dt">
                                        <ul>
                                            <li>
                                                <span class="views" data-toggle="tooltip" data-placement="top" title="Likes">
                                                    <i class="fas fa-heart"></i>
                                                    <ins>Like 562</ins>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="views" data-toggle="tooltip" data-placement="top" title="Comments">
                                                    <i class="fas fa-comment-alt"></i>
                                                    <ins>Comments 0</ins>
                                                </span>
                                            </li>                                               
                                        </ul>
                                    </div>
                                    
                                    <div class="reply-comment">
                                        <div class="post-items">                                            
                                            <div class="reply-dp">
                                                <a href="my_dashboard.html"><img src="images/recipe-details/reply-1.png" alt=""></a>
                                            </div>
                                            <form>
                                                <input type="text" class="comment-input" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post Comment">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="spinner m-bottom">  
                                    <div class="d-flex justify-content-center">
                                        <a href="#"><div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="book-a-table">
                                <div class="restaurants-detail-bg m-bottom">
                                    <h4 class="n-bottom">Book a Table</h4>
                                    <form class="book-table">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 pm-right">
                                                <div class="form-group">
                                                    <div class="checkbox-title">Date</div>
                                                    <input type="text" class="datepicker" name="data" placeholder="Select date">                            
                                                    <span class="calender-icon"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                            </div>                                      
                                            <div class="col-lg-6 col-md-6 pm-left">
                                                <div class="form-group">
                                                    <label for="userName">Name</label>
                                                    <input type="text" class="video-form" id="userName" placeholder="Name">                                                                             
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 pm-right">
                                                <div class="form-group">
                                                    <div class="checkbox-title">Time</div>
                                                    <div class="s-box">
                                                        <select class="selectpicker">
                                                            <option value="0">Select Time</option>
                                                            <option value="1">9AM - 10PM</option>
                                                            <option value="2">10AM - 11PM</option>
                                                            <option value="3">11AM - 12PM</option>
                                                            <option value="4">12PM - 1PM</option>
                                                            <option value="5">1PM - 2PM</option>
                                                            <option value="6">2PM - 3PM</option>
                                                            <option value="7">3PM - 4PM</option>
                                                            <option value="8">4PM - 5PM</option>
                                                            <option value="9">5PM - 6PM</option>
                                                            <option value="10">7PM - 8PM</option>
                                                            <option value="11">8PM - 9PM</option>
                                                            <option value="12">9PM - 10PM</option>
                                                            <option value="13">10PM - 11PM</option>                                                                                                               
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>                                      
                                            <div class="col-lg-6 col-md-6 pm-left">
                                                <div class="form-group">
                                                    <label for="emailAddress">Email</label>
                                                    <input type="email" class="video-form" id="emailAddress" placeholder="Enter email address">                                                                             
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 pm-right">
                                                <div class="form-group">
                                                    <div class="checkbox-title">Members</div>
                                                    <div class="s-box">
                                                        <select class="selectpicker">
                                                            <option value="0">Select Members</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10+</option>                                                                                                                                                                           
                                                        </select>                                                       
                                                    </div>
                                                </div>
                                            </div>                                      
                                            <div class="col-lg-6 col-md-6 pm-left">
                                                <div class="form-group">
                                                    <label for="telNumber">Phone</label>
                                                    <input type="tel" class="video-form" id="telNumber" placeholder="Phone Number"> 
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="messageArea">Message</label>
                                                    <textarea class="text-area" id="messageArea" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="btn-request">
                                                    <input type="submit" value="Request Booking" class="btn-link">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="photos">
                                <div class="restaurants-detail-bg m-bottom">
                                    <h4>Photos</h4>
                                    <p style="font-weight:500;">10 Photos</p>
                                    <div class="gallery-pf">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-1.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-2.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-3.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-4.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-5.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-6.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-7.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">  
                                                <div class="photo-gallery">
                                                    <img src="images/restaurant-detail/photo-8.jpg" alt="">
                                                    <a href="#"><i class="far fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            <div class="spinner q-bottom">  
                                                <div class="d-flex justify-content-center">
                                                    <a href="#"><div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="show-map-result">
                        <a href="#">Get Direction</a>
                    </div>
                    <div class="popular-restaurants">
                        <h4>Popular Restaurents </h4>
                        <div class="popular-restaurants-items">
                            <ul class="list-unstyled">
                                @foreach($popular_restaurants as $rest)
                                    <li>
                                        <a href="restaurant_detail.html"><img src="{{asset('uploads')}}/{{$rest->logo}}" class="img-responsive" alt="image" title="image"></a>
                                        <div class="caption">
                                            <a href="restaurant_detail.html"><h4>{{$rest->name}}</h4></a>
                                            <p>{{$rest->restCity->name}},{{$rest->restCity->country->name}}</p>
                                            <div class="star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>                             
                                                <span>4.5</span>                                            
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>                   
                        </div>                          
                    </div>
                    <div class="google-ads">
                        <a href="#"><img src="images/partners/google-ad.jpg" title="Google Ads"></a>
                    </div>
                </div>
            </div>          
        </div>
    </section>

    @include('frontend.partials._footer')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('frontend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('frontend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
     <!-- Assect scripts for this page-->
    <script src="{{asset('frontend')}}/assets/owlcarousel/owl.carousel.js"></script>
    <script src="{{asset('frontend')}}/js/custom.js"></script>
    <script src="{{asset('frontend')}}/js/thumbnail.slider.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap-select.js"></script>
    <script>
    $(function(){
        $('.datepicker').datepicker();
    });
    </script>
  </body>

</html>
