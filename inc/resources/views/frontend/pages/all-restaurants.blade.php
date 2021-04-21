@extends('frontend.master', ['title'=>'Restaurants'])

@section('main_content')
    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>Restaurants</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Restaurants</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->
    <!--meals start-->
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
                                                                                 
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordiontwo">
                            <div class="location">                          
                                <button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Categories</button>
                                <div id="collapseTwo" class="collapse" data-parent="#accordiontwo">                             
                                    <div class="filter-checkbox">
                                        @foreach($food_categories as $category)
                                            <p>
                                              <input type="checkbox" id="c13" name="cb">
                                              <label for="c13"> {{$category->name}}</label>
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
                                              <label for="c18">{{$cuisine->name}}</label>
                                            </p>
                                        @endforeach
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
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="col-lg-12 col-md-12 m-left m-right">
                        <div class="all-meals-show">
                            <div class="new-heading">
                                <h1> All Restaurants </h1>
                                <div class="loc-title">
                                    Your favourite restaurants
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            @if($restaurants->count() == 0)
                                <p class="text-mute h2 text-center">Data not Available</p>
                                @else
                                @foreach($restaurants as $restaurant)    
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-meal">
                                        <div class="top">
                                            <a href="{{route('frontend.restaurant.details',$restaurant->id)}}"><div class="bg-gradient"></div></a>
                                            <div class="top-img">
                                                <img src="{{asset('uploads')}}/{{$restaurant->cover_photo}}" alt="" style="height: 170px;">
                                            </div>
                                            <div class="top-text">
                                                <div class="sub-heading">
                                                    <h5><a href="{{route('frontend.restaurant.details',$restaurant->id)}}" style="font-size:25px;font-weight:bold;">{{$restaurant->name}}</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <div class="bottom-text">
                                                <div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Fee : {{$gd['globals']->currency}} {{$restaurant->delivery_charge}}</div>
                                                <div class="time"><i class="far fa-clock"></i>Delivery Time : {{$restaurant->delivery_time}} minutes</div>
                                                <div class="delivery"><i class="fas fa-phone"></i>
                                                    Phone : <a href="tel:{{$restaurant->phone}}">{{$restaurant->phone}}</a>
                                                </div>
                                                <div class="time"><i class="far fa-address-card"></i>Address : {{$restaurant->address}}</div>
                                            <div class="time"><i class="far fa-clock"></i>Opening Status : {!! app(\App\Helpers\RestaurantHelper::class)->isRestaurantOpenedNow($restaurant->id) !!} </div>
                                                <div class="star">
                                                    <?php $rating = $restaurant->total_reviews['0']->star_count ?? '0'?>
                                                    @for( $i = 1; $i <= 5; $i++ )
                                                        {!! ($i > $rating) ? '<i class="far fa-star"></i>' : '<i class="fas fa-star"></i>' !!}
                                                    @endfor                        
                                                    <span>{{$rating}} / 5</span> 
                                                </div>                              
                                            </div>
                                        </div>
                                    </div>                  
                                </div>
                                @endforeach
                            @endif
                            
                    <div class="row">
                        <div class="col-lg-12 col-md-12 ">

                            <div class="main-p-pagination m-top">
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
                    </div>
                </div>
                
            </div>          
        </div>
    </section>          
    <!--meals end-->
@endsection

@section('custom_script_files')

@endsection
