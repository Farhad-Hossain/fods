@extends('frontend.master', ['title'=>'My Profile'])
@section('main_content')
    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                        <h3>Profile info</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->    
    <!--my-account start-->
    <section class="my-account">            
        <div class="profile-bg">
            <img src="images/profile/bg-img.jpg" alt="Responsive image">
            <div class="my-Profile-dt">
                <div class="container">
                    <div class="row">
                        <div class="container">                         
                            <div class="profile-dpt">
                                <img src="images/profile/dp-1.jpg" alt="">
                            </div>
                            <div class="profile-all-dt">
                                <div class="profile-name-dt">
                                    <h1>John Doe</h1>
                                    <p><span><i class="fas fa-map-marker-alt"></i></span>Sydney, Australia</p>
                                </div>
                                <div class="profile-dt">
                                    <ul>                                        
                                        <li>
                                            <a href="setting.html" class="setting-btn btn-link"><span><i class="fas fa-cog"></i></span>Setting</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--my-account end-->   
    <!--my-account-tabs start-->
    <section class="all-profile-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="left-tab-links">
                        <div class="nav nav-pills nav-stacked nav-tabs ui vertical menu fluid">
                            <a href="#about" data-toggle="tab" class="item user-tab cursor-pointer">About</a>
                            <a href="#notifications" data-toggle="tab" class="item user-tab cursor-pointer">Notifications <span class="n-badge">2</span></a>
                            <a href="#photos" data-toggle="tab" class="item user-tab cursor-pointer" id="bookmarks" data-tab="bookmarks">Photos</a>
                            <a href="#followers" data-toggle="tab" class="item user-tab cursor-pointer">Followers</a>
                            <a href="#following" data-toggle="tab" class="item user-tab cursor-pointer">Following</a>
                            <a href="#recently-viewed-restaurants" data-toggle="tab" class="item user-tab cursor-pointer">Recently Viewed Restaurants</a>                                                                               
                            <a href="#reviews" data-toggle="tab" class="item user-tab cursor-pointer">Reviews</a>
                            <a href="#ratings" data-toggle="tab" class="item user-tab cursor-pointer">Rating</a>                            
                            <a href="#my-orders" data-toggle="tab" class="item user-tab cursor-pointer">My Orders</a>
                            <a href="#order-history" data-toggle="tab" class="item user-tab cursor-pointer">Order History</a>                                                                                                                                       
                            <a href="#my-videos" data-toggle="tab" class="item user-tab cursor-pointer">My Videos</a>
                            <a href="#recently-watch" data-toggle="tab" class="item user-tab cursor-pointer">Recently Watch</a>                 
                            <a href="#manage-cards" data-toggle="tab" class="item user-tab cursor-pointer">Manage Cards</a>
                            <a href="#manage-wallets" data-toggle="tab" class="item user-tab cursor-pointer">Manage Wallets</a>
                        </div>                      
                    </div>              
                </div>
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="tab-content">
                        <div class="tab-pane" id="about">
                            <div class="profile-about">
                                <div class="tab-content-heading">
                                    <h4>About</h4>
                                    <a href="setting.html"><i class="far fa-edit"></i>Edit Info</a>
                                </div>
                                <div class="about-dtp">
                                    <div class="about-bg">
                                        <ul>
                                            <li>
                                                <div class="dp-detail">
                                                    <h6>Ful Name</h6>
                                                    <p>{{ Auth::user()->name }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dp-detail">
                                                    <h6>Location</h6>
                                                    <p></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dp-detail">
                                                    <h6>Mobile Number</h6>
                                                    <p>+ 2 987 654 3210</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dp-detail">
                                                    <h6>Email Address</h6>
                                                    <p>Johndoe@gmail.com</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dp-detail">
                                                    <h6>Personal Website</h6>
                                                    <p>www.johndoe.com</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dp-detail">
                                                    <h6>Description About Yopur Self</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur elementum leo sit amet volutpat porta. Integer tincidunt id enim eget suscipit. Aenean vitae mi at arcu pulvinar dictum. Donec pretium ipsum diam, vitae posuere nunc dapibus ut. Vivamus tempus et magna at elementum</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dp-detail">
                                                    <h6>Social Accounts</h6>
                                                    <div class="my-social-links">
                                                        <a href="#" class="socail-btn-link f-btn"><i class="fab fa-facebook-f"></i></a>
                                                        <a href="#" class="socail-btn-link t-btn"><i class="fab fa-twitter"></i></a>
                                                        <a href="#" class="socail-btn-link g-btn"><i class="fab fa-google"></i></a>
                                                        <a href="#" class="socail-btn-link i-btn"><i class="fab fa-instagram"></i></a>
                                                        <a href="#" class="socail-btn-link y-btn"><i class="fab fa-youtube"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="notifications">
                            <div class="profile-about">
                                <div class="tab-content-heading">
                                    <h4>Notifications</h4>
                                    <a href="setting.html"><i class="fas fa-cog"></i>Setting</a>
                                </div>
                                <div class="noti-all">
                                    <div class="noti-bg">
                                        <ul>
                                            <li>
                                                <div class="n-media">
                                                    <div class="n-media-left">
                                                        <img src="images/profile/noti-1.png" alt="">    
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            Jassica William 
                                                        </h4>
                                                        <p>comment on your Video.</p>
                                                            <div class="n-comment-date">
                                                        2 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="n-media">
                                                    <div class="n-media-left">
                                                        <img src="images/profile/noti-2.png" alt="">    
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            Johnson Smith
                                                        </h4>
                                                        <p>reply on your comment in  Restro Restaurant rating.</p>
                                                        <div class="n-comment-date">
                                                        4 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="n-media">
                                                    <div class="n-media-left">
                                                        <img src="images/profile/noti-3.png" alt="">    
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            Rock Hunter
                                                        </h4>
                                                        <p>reply on your comment in recipe video.</p>
                                                        <div class="n-comment-date">
                                                        10 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="n-media">
                                                    <div class="n-media-left">
                                                        <img src="images/profile/noti-4.png" alt="">    
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            Jassica William
                                                        </h4>
                                                        <p>following you.</p>
                                                        <div class="n-comment-date">
                                                        10 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="n-media">
                                                    <div class="n-media-left">
                                                        <img src="images/profile/noti-5.png" alt="">    
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            Joy Smith
                                                        </h4>
                                                        <p>rating your video.</p>
                                                        <div class="n-comment-date">
                                                        15 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="n-media">
                                                    <div class="n-media-left">
                                                        <img src="images/profile/noti-6.png" alt="">    
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            Order Request
                                                        </h4>
                                                        <p>2 Burn Burger Request.</p>
                                                        <div class="n-comment-date">
                                                        20 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="n-media">
                                                    <div class="n-media-left">
                                                        <img src="images/profile/noti-7.png" alt="">    
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            Congratulations!
                                                        </h4>
                                                        <p>Your order is delivered.</p>
                                                        <div class="n-comment-date">
                                                        22 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="photos">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Photos</h4>                     
                                </div>
                                <div class="about-dtp">
                                    <div class="photo-bg">
                                        <div class="gallery-pf">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-1.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-2.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-3.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-4.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-5.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-6.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-7.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-8.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="photo-gallery">
                                                        <img src="images/restaurant-detail/photo-2.jpg" alt="">
                                                        <a href="#"><i class="far fa-plus-square"></i></a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="followers">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Followers</h4>                      
                                </div>
                                <div class="about-dtp">
                                    <div class="follow-bg">
                                        <ul>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-1.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>Jassica William</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Follow</button>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-2.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>Johnson Smith</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Follow</button>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-3.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>John Doe</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Follow</button>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-5.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>Rock Willliam</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Follow</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="following">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Followings</h4>                     
                                </div>
                                <div class="about-dtp">
                                    <div class="follow-bg">
                                        <ul>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-1.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>Jassica William</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Following</button>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-2.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>Johnson Smith</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Following</button>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-3.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>John Doe</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Following</button>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="suggestion-usd-2">
                                                    <a href="user_profile_view.html"><img src="images/profile/noti-5.png" alt=""></a>
                                                    <div class="sgt-text-2">
                                                        <a href="user_profile_view.html"><h4>Rock Willliam</h4></a>
                                                        <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia<p>
                                                    </div>
                                                    <button class="btn-link">Following</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="recently-viewed-restaurants">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Recently Viewed Restaurants</h4>                        
                                </div>
                                <div class="about-dtp">
                                    <div class="recently-resto-bg">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12 pm-right">
                                                    <div class="visit-restaurants">
                                                        <div class="recently-resto-picy">
                                                            <a href="restaurant_detail.html"><img src="images/profile/view-1.jpg" alt=""></a>
                                                        </div>
                                                        <div class="recently-resto-dt">
                                                        <a href="restaurant_detail.html"><h4>Restaurant Name</h4></a>
                                                         <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 pm-left">
                                                    <div class="visit-restaurants">
                                                        <div class="recently-resto-picy">
                                                            <a href="restaurant_detail.html"><img src="images/profile/view-2.jpg" alt=""></a>
                                                        </div>
                                                        <div class="recently-resto-dt">
                                                        <a href="restaurant_detail.html"><h4>Restaurant Name</h4></a>
                                                         <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 pm-right">
                                                    <div class="visit-restaurants">
                                                        <div class="recently-resto-picy">
                                                            <a href="restaurant_detail.html"><img src="images/profile/view-3.jpg" alt=""></a>
                                                        </div>
                                                        <div class="recently-resto-dt">
                                                         <a href="restaurant_detail.html"><h4>Restaurant Name</h4></a>
                                                         <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 pm-left">
                                                    <div class="visit-restaurants">
                                                        <div class="recently-resto-picy">
                                                            <a href="restaurant_detail.html"><img src="images/profile/view-4.jpg" alt=""></a>
                                                        </div>
                                                        <div class="recently-resto-dt">
                                                         <a href="restaurant_detail.html"><h4>Restaurant Name</h4></a>
                                                         <p><span><i class="fas fa-map-marker-alt"></i></span> Sydney, Australia</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                  
                        </div>                      
                        
                        <div class="tab-pane" id="reviews">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Reviews</h4>
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
                                            <h4> Rock Smith</h4>
                                        </div>
                                        <div class="reply-time">                                
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
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
                                                <input type="text" class="comment-input-1" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="images/recipe-details/comment-2.png" alt=""></a>
                                            <h4> Jassica William</h4><br>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur elementum leo sit amet volutpat porta. Integer tincidunt id enim eget suscipit. Aenean vitae mi at arcu pulvinar dictum. Donec pretium ipsum diam, vitae posuere nunc dapibus ut. Vivamus tempus et magna at elementum. Morbi sed turpis vitae elit pellentesque pharetra vel ut nisl.</p>
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
                                                <input type="text" class="comment-input-1" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="images/recipe-details/comment-1.png" alt=""></a>
                                            <h4> John Doe</h4><br>
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
                                            <a href="user_profile_view.html"><img src="images/recipe-details/reply-1.png" alt=""  ></a>
                                            <h4> Rock Smith</h4>
                                        </div>
                                        <div class="reply-time">                                
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
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
                                                <input type="text" class="comment-input-1" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>  
                        
                        <div class="tab-pane" id="ratings">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Ratings</h4>
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
                                            <h4> Rock Smith</h4>
                                        </div>
                                        <div class="reply-time">                                
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
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
                                                <input type="text" class="comment-input-1" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="images/recipe-details/comment-2.png" alt=""></a>
                                            <h4> Jassica William</h4><br>
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
                                            <p><ins>Tags :</ins><a href="#">Johnson,</a> <a href="#"> Rock Hunter,</a> <a href="#"> Joy William,</a> <a href="#"> Johnson,</a><a href="#"> Jass Singh,</a>&nbsp; <span> and</span>&nbsp; <a href="#">8 others</a></p>
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
                                                <input type="text" class="comment-input-1" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-comments">
                                    <div class="rating-1">
                                        <div class="user-detail-heading">
                                            <a href="user_profile_view.html"><img src="images/recipe-details/comment-1.png" alt=""></a>
                                            <h4> John Doe</h4><br>
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
                                                    <div class="post">
                                                        <a href="#" data-toggle="modal" data-target="#videoModal-2"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                    </div>
                                                    <div class="modal fade " id="videoModal-2" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
                                                      <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                          <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <div>
                                                              <iframe height="450" src="https://www.youtube.com/embed/6CFJhTKcGJ4" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
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
                                            <a href="user_profile_view.html"><img src="images/recipe-details/reply-1.png" alt=""  ></a>
                                            <h4> Rock Smith</h4>
                                        </div>
                                        <div class="reply-time">                                
                                            <p><i class="far fa-clock"></i>12 hours ago</p>
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
                                                <input type="text" class="comment-input-1" name="post" placeholder="Write a comment - @tag friends">
                                                <input class="reply-btn btn-link" type="submit" value="Post">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="tab-pane" id="my-orders">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>My Orders</h4>
                                </div>
                                <div class="my-orders">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="my-checkout">
                                                <div class="table-responsive">
                                                    <table class="table  table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td class="td-heading">Meal</td>
                                                                <td class="td-heading">Qty</td>
                                                                <td class="td-heading">Price</td>
                                                                <td class="td-heading">Action</td>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="checkout-thumb-2">
                                                                        <a href="meal_detail.html">
                                                                            <img src="images/checkout/thumb-1.jpg" class="img-responsive" alt="thumb" title="thumb">
                                                                        </a>
                                                                    </div>
                                                                    <div class="name-dt">
                                                                        <a href="meal_detail.html"><h4>Hum Burgar</h4></a>
                                                                        <a href="restaurant_detail.html"><p>Restaurant Name</p></a>
                                                                        
                                                                    </div>
                                                                </td>                                   
                                                                <td class="td-content">2</td>                                       
                                                                <td class="td-content">$22.00</td>
                                                                <td>
                                                                    <button class="trace-btn btn-link" data-toggle="modal" data-target="#trace">Trace</button>                                                          
                                                                    <button class="invoice-btn btn-link"><i class="far fa-file-alt"></i></button>
                                                                    <button class="trash-btn btn-link"><i class="far fa-trash-alt"></i></button>
                                                                    
                                                                    <div class="modal fade" tabindex="-1" id="trace" role="dialog" aria-hidden="true">
                                                                        <div class="modal-dialog modal-xl">
                                                                            <div class="modal-content">
                                                                                <div class="trace-model">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>                                                  
                                                                                    <div class="container mb-1">
                                                                                        <div class="row no-gutters">
                                                                                            <div class="col-lg-8 col-md-6 col-12">
                                                                                                <div class="trace-map">
                                                                                                    <img src="images/profile/trace-map.jpg" alt="">
                                                                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6848.588137286094!2d75.8069355495411!3d30.878433570394723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a822f25912599%3A0xa51f780d31824240!2sShaheed+Bhagat+Singh+Nagar%2C+Ludhiana%2C+Punjab!5e0!3m2!1sen!2sin!4v1556363627043!5m2!1sen!2sin" style="border:0" allowfullscreen=""></iframe>
                                                                                                    <div class="map-location-tooltip-3">
                                                                                                        <div class="tooltip tooltip-main-3">
                                                                                                            <span class="tooltip-item-3"></span>
                                                                                                            <span class="tooltip-content-3">Food Location</span>
                                                                                                        </div>
                                                                                                        <div class="tooltip tooltip-main-3">
                                                                                                            <span class="tooltip-item-3"></span>
                                                                                                            <span class="tooltip-content-3">Your Location</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>                                                                                          
                                                                                            </div>
                                                                                            <div class="col-lg-4 col-md-6 col-12">
                                                                                                <div class="right-order-dt">
                                                                                                    <div class="order-no">Order No : 123456</div>
                                                                                                    <h1>Restaurant Name</h1>
                                                                                                    <div class="resto-trace-star">
                                                                                                        <i class="fas fa-star"></i>
                                                                                                        <i class="fas fa-star"></i>
                                                                                                        <i class="fas fa-star"></i>
                                                                                                        <i class="fas fa-star"></i>
                                                                                                        <i class="far fa-star"></i>                             
                                                                                                        <span>4.5/5</span> 
                                                                                                    </div>
                                                                                                    <div class="trace-steps">
                                                                                                        <ul>
                                                                                                            <li class="active">
                                                                                                                <div class="steps-names">Order Accepted</div>
                                                                                                            </li>
                                                                                                            <li class="active">
                                                                                                                <div class="steps-names">Food Ready</div>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <div class="steps-names">On The Way</div>
                                                                                                            </li>                                                                                                           
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="payment-method-dt">
                                                                                                        <div class="attr-l">Payment Method</div>
                                                                                                        <div class="attr-r">Cash on Delivery</div>
                                                                                                    </div>
                                                                                                    <div class="payment-method-dt">
                                                                                                        <div class="attr-l">Discount Offer</div>
                                                                                                        <div class="attr-r">Natto50</div>
                                                                                                    </div>
                                                                                                    <div class="payment-tol-dt">
                                                                                                        <div class="attr-l2">Total</div>
                                                                                                        <div class="attr-r2">$13</div>
                                                                                                    </div>
                                                                                                    <div class="payment-method-dt">
                                                                                                        <div class="attr-l">Estimated Delivery Time</div>
                                                                                                        <div class="attr-r">35 min</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                          
                                                                        </div>
                                                                    </div>
                                                                </td>                                                               
                                                            </tr>                                                                                                                       
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="order-history">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Order History</h4>
                                </div>
                                <div class="my-orders">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="my-checkout">
                                                <div class="table-responsive">
                                                    <table class="table  table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td class="td-heading">Meal</td>
                                                                <td class="td-heading">Qty</td>
                                                                <td class="td-heading">Price</td>
                                                                <td class="td-heading">Action</td>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="checkout-thumb-2">
                                                                        <a href="meal_detail.html">
                                                                            <img src="images/profile/order-1.jpg" class="img-responsive" alt="thumb" title="thumb">
                                                                        </a>
                                                                    </div>
                                                                    <div class="name-dt">
                                                                        <a href="meal_detail.html"><h4>Hum Burgar</h4></a>
                                                                        <a href="restaurant_detail.html"><p>Restaurant Name</p></a>
                                                                        
                                                                    </div>
                                                                </td>                                   
                                                                <td class="td-content">2</td>                                       
                                                                <td class="td-content">$22.00</td>
                                                                <td>
                                                                    <button class="trace-btn btn-link">Completed</button>                                                           
                                                                    <button class="invoice-btn btn-link"><i class="far fa-file-alt"></i></button>
                                                                    <button class="trash-btn btn-link"><i class="far fa-trash-alt"></i></button>                                                                                                                                
                                                                </td>                                                               
                                                            </tr>   
                                                            <tr>
                                                                <td>
                                                                    <div class="checkout-thumb-2">
                                                                        <a href="meal_detail.html">
                                                                            <img src="images/profile/order-2.jpg" class="img-responsive" alt="thumb" title="thumb">
                                                                        </a>
                                                                    </div>
                                                                    <div class="name-dt">
                                                                        <a href="meal_detail.html"><h4>Cheese Pizza</h4></a>
                                                                        <a href="restaurant_detail.html"><p>Restaurant Name</p></a>
                                                                        
                                                                    </div>
                                                                </td>                                   
                                                                <td class="td-content">1</td>                                       
                                                                <td class="td-content">$18.00</td>
                                                                <td>
                                                                    <button class="trace-btn btn-link">Completed</button>                                                           
                                                                    <button class="invoice-btn btn-link"><i class="far fa-file-alt"></i></button>
                                                                    <button class="trash-btn btn-link"><i class="far fa-trash-alt"></i></button>                                                                                                                                
                                                                </td>                                                               
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="checkout-thumb-2">
                                                                        <a href="meal_detail.html">
                                                                            <img src="images/profile/order-3.jpg" class="img-responsive" alt="thumb" title="thumb">
                                                                        </a>
                                                                    </div>
                                                                    <div class="name-dt">
                                                                        <a href="meal_detail.html"><h4>Veg Noodles</h4></a>
                                                                        <a href="restaurant_detail.html"><p>Restaurant Name</p></a>
                                                                        
                                                                    </div>
                                                                </td>                                   
                                                                <td class="td-content">1</td>                                       
                                                                <td class="td-content">$20.00</td>
                                                                <td>
                                                                    <button class="trace-btn btn-link">Completed</button>                                                           
                                                                    <button class="invoice-btn btn-link"><i class="far fa-file-alt"></i></button>
                                                                    <button class="trash-btn btn-link"><i class="far fa-trash-alt"></i></button>                                                                                                                                
                                                                </td>                                                               
                                                            </tr>       
                                                            <tr>
                                                                <td>
                                                                    <div class="checkout-thumb-2">
                                                                        <a href="meal_detail.html">
                                                                            <img src="images/profile/order-4.jpg" class="img-responsive" alt="thumb" title="thumb">
                                                                        </a>
                                                                    </div>
                                                                    <div class="name-dt">
                                                                        <a href="meal_detail.html"><h4>Chicken Masala</h4></a>
                                                                        <a href="restaurant_detail.html"><p>Restaurant Name</p></a>                                                                     
                                                                    </div>
                                                                </td>                                   
                                                                <td class="td-content">1</td>                                       
                                                                <td class="td-content">$25.00</td>
                                                                <td>
                                                                    <button class="trace-btn btn-link">Completed</button>                                                           
                                                                    <button class="invoice-btn btn-link"><i class="far fa-file-alt"></i></button>
                                                                    <button class="trash-btn btn-link"><i class="far fa-trash-alt"></i></button>                                                                                                                                
                                                                </td>                                                               
                                                            </tr>       
                                                        </tbody>                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                        
                        <div class="tab-pane" id="my-videos">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Videos</h4>                     
                                </div>
                                <div class="about-dtp">
                                    <div class="photo-bg">
                                        <div class="gallery-pf">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-1.jpg" alt="">
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-2.jpg" alt="">
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-3.jpg" alt=""> 
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-4.jpg" alt="">
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-5.jpg" alt=""> 
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-6.jpg" alt="">                                                     
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-7.jpg" alt="">                                                     
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-8.jpg" alt="">                                                     
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-2.jpg" alt="">                                             
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane " id="recently-watch">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Recently Watch</h4>                     
                                </div>
                                <div class="about-dtp">
                                    <div class="photo-bg">
                                        <div class="gallery-pf">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-1.jpg" alt="">
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-2.jpg" alt="">
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-3.jpg" alt=""> 
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-4.jpg" alt="">
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-5.jpg" alt=""> 
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-6.jpg" alt="">                                                     
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-7.jpg" alt="">                                                     
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-8.jpg" alt="">                                                     
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">  
                                                    <div class="video-gallery">
                                                        <img src="images/restaurant-detail/photo-2.jpg" alt="">                                             
                                                        <div class="middle">
                                                            <a href="recipe_details.html"><div class="play-btn"><i class="fas fa-play"></i></div></a>
                                                        </div>
                                                    </div>
                                                </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="manage-cards">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Payments</h4>
                                </div>
                                <div class="payments">
                                    <div class="payment-dt">
                                        <h4>Manage Cards</h4>                                       
                                        <p>No Cards Manage</p>
                                    </div>
                                    <div class="card-dbt">                                      
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">                                                                                
                                                    <h4>Add New card*</h4>
                                                    <form>
                                                        <div class="form-group">                                                            
                                                            <input type="text" class="video-form" id="cardNumber" name="cardNumber" placeholder="Card Number">                                                                              
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="video-form" id="cardHolder" name="cardHolder" placeholder="Holder Name">                                                                              
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-12 pm-right">
                                                                <div class="form-group">
                                                                    <select class="selectpicker" tabindex="-98">
                                                                        <option value="0">Month</option>
                                                                        <option value="1">January</option>
                                                                        <option value="2">February</option>
                                                                        <option value="3">March</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">May</option>
                                                                        <option value="6">June</option>
                                                                        <option value="7">July</option>
                                                                        <option value="8">August</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>                                                                                                                                                                                                                                                                                  
                                                                    </select>                                                                           
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12 pm-left pm-right">
                                                                <div class="form-group">
                                                                    <select class="selectpicker" tabindex="-98">
                                                                        <option value="0">Year</option>
                                                                        <option value="1">2019</option>
                                                                        <option value="2">2020</option>
                                                                        <option value="3">2021</option>
                                                                        <option value="4">2022</option>
                                                                        <option value="5">2023</option>
                                                                        <option value="6">2024</option>
                                                                        <option value="7">2025</option>
                                                                        <option value="8">2026</option>
                                                                        <option value="9">2027</option>
                                                                        <option value="10">2028</option>
                                                                        <option value="11">2029</option>
                                                                        <option value="12">2030</option>                                                                                                                                                                                                                                                                                  
                                                                    </select>                                                                           
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12 pm-left">
                                                                <div class="form-group">
                                                                    <input type="text" class="video-form" id="cardCvv" placeholder="Cvv">                                                                               
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12 ">
                                                                <div class="form-group">
                                                                    <button class="card-btn btn-link">Add Card</button>                                                                             
                                                                </div>
                                                            </div>
                                                        </div>                                                      
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="manage-wallets">
                            <div class="timeline">
                                <div class="tab-content-heading">
                                    <h4>Payments</h4>
                                </div>
                                <div class="payments">
                                    <div class="payment-dt">
                                        <h4>Manage Wallets</h4>                                     
                                        <p>No Wallet Manage</p>
                                        <div class ="wallet-btns">
                                            <button class="wallet-btn"><img src="images/profile/payapl.png" alt=""></button>                                                                                    
                                            <button class="wallet-btn"><img src="images/profile/mobiwik.png" alt=""></button>                                                                                   
                                            <button class="wallet-btn"><img src="images/profile/paytm.png" alt=""></button>                                                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="suggested-peoples mt-0">
                        <div class="suggestions full-width">
                            <div class="sd-title">
                                <h3>Suggested Peoples</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div><!--sd-title end-->
                            <div class="suggestions-list">
                                <div class="suggestion-usd">
                                    <a href="user_profile_view.html"><img src="images/find-recipes/user-1.png" alt=""></a>
                                    <div class="sgt-text">
                                        <a href="user_profile_view.html"><h4>Johnson</h4></a>
                                        <span>7 Reviews</span>
                                    </div>
                                    <button><i class="fas fa-user-plus"></i></button>
                                </div>
                                <div class="suggestion-usd">
                                    <a href="user_profile_view.html"><img src="images/find-recipes/user-2.png" alt=""></a>
                                    <div class="sgt-text">
                                        <a href="user_profile_view.html"><h4>Jassia William</h4></a>
                                        <span>5 Reviews</span>
                                    </div>
                                    <button><i class="fas fa-user-plus"></i></button>
                                </div>
                                <div class="suggestion-usd">
                                    <a href="user_profile_view.html"><img src="images/find-recipes/user-3.png" alt=""></a>
                                    <div class="sgt-text">
                                        <a href="user_profile_view.html"><h4>Rock</h4></a>
                                        <span>0 Reviews</span>
                                    </div>
                                    <button><i class="fas fa-user-plus"></i></button>
                                </div>
                                <div class="suggestion-usd">
                                    <a href="user_profile_view.html"><img src="images/find-recipes/user-4.png" alt=""></a>
                                    <div class="sgt-text">
                                        <a href="user_profile_view.html"><h4>Davil Smith</h4></a>
                                        <span>10 Reviews</span>
                                    </div>
                                    <button><i class="fas fa-user-plus"></i></button>
                                </div>
                                <div class="suggestion-usd">
                                    <a href="user_profile_view.html"><img src="images/find-recipes/user-5.png" alt=""></a>
                                    <div class="sgt-text">
                                        <a href="user_profile_view.html"><h4>Ricky Doe</h4></a>
                                        <span>3 Reviews</span>
                                    </div>
                                    <button><i class="fas fa-user-plus"></i></button>
                                </div>
                            </div><!--suggestions-list end-->
                        </div>
                    </div>
                    
                    <div class="suggested-peoples h-top ">
                        <div class="suggestions full-width">
                            <div class="sd-title">
                                <h3>Photos</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div><!--sd-title end-->
                            <div class="suggestions-list">
                                <div class="pf-gallery">
                                    <ul>
                                        <li><a href="#" title=""><img src="images/profile/right-1.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-2.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-3.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-4.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-5.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-6.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-7.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-8.jpg" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/profile/right-9.jpg" alt=""></a></li>
                                    </ul>
                                </div>                              
                            </div><!--photo-list end-->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--my-account-tabs end-->
@endsection
