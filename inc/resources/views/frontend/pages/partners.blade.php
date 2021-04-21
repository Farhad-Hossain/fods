@extends('frontend.master',['title'=>'Our Partners'])
@section('main_content')
    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>Partners</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Partners</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->    
    <!--partners start-->
    <section class="all-partners">          
        <div class="container">     
            <div class="row">   
                <div class="col-lg-3 col-md-4">
                    <div class="filters partner-bottom">
                        <div class="filter-heading">                        
                            <h3>Filters</h3>
                        </div>
                        <div class="accordion" id="accordionone">
                            <div class="location">
                            <button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Location</button>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionone">
                                    <div class="search-area">
                                        <form>
                                            <input class="search-area-input" name="search" type="text" placeholder="Search your area">
                                            <div class="icon-btn">
                                                <div class="cross-area-icon">
                                                    <i class="fas fa-crosshairs"></i>
                                                </div>                                      
                                            </div>                                      
                                        </form>
                                    </div>
                                    <div class="filter-checkbox">
                                        <p>
                                          <input type="checkbox" id="c1" name="cb">
                                          <label for="c1">All</label>
                                        </p>
                                        @foreach($cities as $city)
                                            <p>
                                              <input type="checkbox" id="c12" name="cb">
                                              <label for="c12">{{$city->name}}</label>
                                            </p>
                                        @endforeach
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordiontwo">
                            <div class="location">                          
                                <button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Categories</button>
                                <div id="collapseTwo" class="collapse" data-parent="#accordiontwo">                             
                                    <div class="filter-checkbox">
                                        @foreach($food_categories as $food_category)
                                            <p>
                                              <input type="checkbox" id="c13" name="cb">
                                              <label for="c13"> {{$food_category->name}}</label>
                                            </p>
                                        @endforeach
                                    </div>                                                                      
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionthree">
                            <div class="location">                          
                                <button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Cuisine</button>
                                <div id="collapseThree" class="collapse" data-parent="#accordionthree">                                 
                                    <div class="filter-checkbox">
                                        @foreach($cuisines as $cuisine)
                                            <p>
                                              <input type="checkbox" id="c18" name="cb">
                                              <label for="c18">{{ $cuisine->name }}</label>
                                            </p>
                                        @endforeach
                                    </div>                                                                      
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionfour">
                            <div class="location">                          
                                <button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Establish Type</button>
                                <div id="collapseFour" class="collapse" data-parent="#accordionfour">                                   
                                    <div class="filter-checkbox">
                                        <p>
                                          <input type="checkbox" id="c30" name="cb">
                                          <label for="c30">Cafe’s</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c31" name="cb">
                                          <label for="c31">Dhaba’s</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c32" name="cb">
                                          <label for="c32">Sweet Shopst</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c33" name="cb">
                                          <label for="c33">Fine Dinings</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c34" name="cb">
                                          <label for="c34">Casual Dinings</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c35" name="cb">
                                          <label for="c35">Bakeries</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c36" name="cb">
                                          <label for="c36">Bars</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c37" name="cb">
                                          <label for="c37">Vine Shops</label>
                                        </p>                                                        
                                        <p>
                                          <input type="checkbox" id="c38" name="cb">
                                          <label for="c38">Halls</label>
                                        </p>                                                                        
                                    </div>                                                                      
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionfive">
                            <div class="location">                          
                                <button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Restaurants offers</button>
                                <div id="collapseFive" class="collapse" data-parent="#accordionfive">                                   
                                    <div class="filter-checkbox">
                                        <p>
                                          <input type="checkbox" id="c39" name="cb">
                                          <label for="c39">10% off</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c40" name="cb">
                                          <label for="c40">20% off</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c41" name="cb">
                                          <label for="c41">30% off</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c42" name="cb">
                                          <label for="c42">40% off</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c43" name="cb">
                                          <label for="c43">50% off</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c44" name="cb">
                                          <label for="c44">60% off</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c45" name="cb">
                                          <label for="c45">70% off</label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c46" name="cb">
                                          <label for="c46">80% off</label>
                                        </p>                                                                                                                                                                    
                                    </div>                                                                      
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionsix">
                            <div class="location">                          
                                <button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Rating</button>
                                <div id="collapseSix" class="collapse"  data-parent="#accordionsix">                                    
                                    <div class="filter-checkbox">
                                        <p>
                                          <input type="checkbox" id="c47" name="cb">
                                          <label for="c47" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c48" name="cb">
                                          <label for="c48" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c49" name="cb">
                                          <label for="c49" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c50" name="cb">
                                          <label for="c50" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
                                        </p>
                                        <p>
                                          <input type="checkbox" id="c51" name="cb">
                                          <label for="c51" class="rating-color"><i class="fas fa-star"></i></label>
                                        </p>                                                                                                                                                                                                        
                                    </div>                                                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                <div class="col-lg-6 col-md-8">
                    @foreach($restaurants as $restaurant)    
                    <div class="partner-section">
                        <div class="partner-bar">
                            <div class="partner-topbar">
                                <div class="partner-dt">
                                    <a href="restaurant_detail.html"><img src="images/partners/img-1.jpg" alt=""></a>
                                    <div class="partner-name">
                                        <a href="restaurant_detail.html"><h4>{{$restaurant->name}} </h4></a>
                                        <div class="country">{{$restaurant->restCity->name}},{{$restaurant->restCity->country->name}}</div>
                                        <p><span><i class="fas fa-map-marker-alt"></i></span>{{$restaurant->address}}</p>
                                        <div class="bagde-dt">
                                            <div class="partner-badge">
                                                Partner
                                            </div>
                                            <p>Casual Dining</p>
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
                                                {{$loop->last?$cuisine->name:$cuisine->name.','}}
                                            @endforeach
                                        </li>
                                        <li>Featured : 
                                            @foreach($restaurant->tags as $tag)
                                                {{$loop->last?$tag->name:$tag->name.','}}
                                            @endforeach 
                                        </li>
                                        <li>Discount : 20% of on all orders</li>
                                        <li>Reviews : <div class="review-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>                             
                                            <span>4.5</span>                                    
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
                                    <li><a href="Tel:{{$restaurant->phone}}" data-toggle="tooltip" data-placement="top" title="Call Now"><i class="fas fa-phone"></i>Call Now</a></li>
                                    <li class="line-lr"><a href="{{route('frontend.restaurant.details',$restaurant->id)}}" data-toggle="tooltip" data-placement="top" title="Order Now"><i class="fas fa-shopping-cart"></i>Order Now</a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="View Menu"><i class="fas fa-book"></i>View Menu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="main-p-pagination">
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i>
                              </a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">24</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <i class="fas fa-chevron-right"></i>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="show-map-result">
                        <a href="#">Show result on map</a>
                    </div>
                    <div class="popular-restaurants">
                        <h4>Popular Restaurents </h4>
                        <div class="popular-restaurants-items">
                            <ul class="list-unstyled">
                                @foreach($restaurants as $restaurant)
                                <li>
                                    <a href="{{route('frontend.restaurant.details', $restaurant->id)}}"><img src="{{asset('uploads')}}/{{$restaurant->logo}}" class="img-responsive" alt="image" title="image"></a>
                                    <div class="caption">
                                        <a href="{{route('frontend.restaurant.details',$restaurant->id)}}"><h4>{{$restaurant->name}}</h4></a>
                                        <p>{{$restaurant->restCity->name}}, {{$restaurant->restCity->country->name}}</p>
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
                        <a href="#"><img src="images/partners/google-ad.jpg" alt="image" title="Google Ads"></a>
                    </div>
                </div>
            </div>          
        </div>
    </section>
    <!--partners end-->
@endsection
