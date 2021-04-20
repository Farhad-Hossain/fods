@extends('frontend.master', ['title'=>'Restaurants and More'])

@section('main_content')
    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>Restaurant's & More</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="browse_places.html">Browse Places</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cafe's & More</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->    
    <!--browse-places start-->
    <section class="browse-places-all">         
        <div class="container">     
            <div class="row">   
                <div class="col-md-12">
                    <div class="new-heading">
                        <h1> Restaurant's & More </h1>
                    </div>                      
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 text-left">
                    <div class="form-group k-bottom">
                        <label for="searchLocation"><ins>Location : Hill District, Sydney, Australia <a href="#">(Change Location)</a></ins></label>
                        <div class="field-input">
                            <input type="text" class="nearby-form" id="searchLocation" placeholder="Search your location">                          
                            <i class="fas fa-search"></i>
                        </div>                                          
                    </div>
                    
                </div>                              
            </div>
            <div class="row text-left">
                @foreach($restaurants as $restaurant)    
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="partner-section">
                        <div class="partner-bar">
                            <div class="partner-topbar">
                                <div class="partner-dt">
                                    <a href="restaurant_detail.html"><img src="{{asset('uploads')}}/{{$restaurant->logo}}" alt=""></a>
                                    <div class="partner-name">
                                        <a href="restaurant_detail.html"><h4>{{$restaurant->name}} </h4></a>
                                        <div class="country">{{$restaurant->restCity->name}},{{$restaurant->restCity->country->name}}</div>
                                        <p><span><i class="fas fa-map-marker-alt"></i></span>{{$restaurant->address}}</p>
                                        <div class="bagde-dt">
                                        </div>
                                    </div>
                                    <div class="online-offline">
                                        <p><span class="span-1 active"><i class="fas fa-circle"></i></span>Online</p>
                                    </div>
                                </div>
                            </div>
                            <div class="partner-subbar">
                                <div class="detail-text">
                                    <ul>
                                        <li>Open - Close : 9.00AM to 12PM (Mon-Sun)</li>
                                        <li>Cuisines : 
                                            @foreach($restaurant->cuisines as $cuisine)
                                                @if($loop->last)
                                                    {{ $cuisine->name }}
                                                @else
                                                    {{ $cuisine->name }},
                                                @endif
                                            @endforeach
                                        </li>
                                        <li>Featured : 
                                            @foreach($restaurant->tags as $tag)
                                                @if($loop->last)
                                                    {{$tag->name}}
                                                @else
                                                    {{$tag->name}},
                                                @endif
                                            @endforeach
                                        </li>
                                        <li>Discount : N/A</li>
                                        <li>Reviews : <div class="review-stars">
                                            <?php 
                                                $average_rating = \App\Helpers\Helper::getRestaurantAverageRating( $restaurant->id ) 
                                            ?>

                                            @for ( $i = 0; $i < $average_rating; $i++ ) 
                                                <i class="fas fa-star"></i>
                                            @endfor                         

                                            <span> {!! number_format( $average_rating, 2 ) !!} </span>                                    
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bookmark">
                                    <span><i class="far fa-bookmark"></i>Bookmark</span>
                                </div>
                            </div>
                            <div class="partner-bottombar">
                                <ul class="bottom-partner-links">
                                    <li><a href="Tel:{!! $restaurant->phone !!}" data-toggle="tooltip" data-placement="top" title="Call Now"><i class="fas fa-phone"></i>Call Now</a></li>
                                    <li class="line-lr"><a href="#" data-toggle="tooltip" data-placement="top" title="Order Now"><i class="fas fa-shopping-cart"></i>Order Now</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--browse-places end-->
@endsection
