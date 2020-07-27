@extends('frontend.master')

@section('custom_style')
    <link rel="stylesheet" href="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('frontend') !!}/css/custom/add_restaurant.css">
@endsection

@section('main_content')

    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <h3>Add Restaurant</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Restaurant</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->
    <!--add-restaurant start-->
    <section class="add-restaurant">
        <form action="{!! route('frontend.add-restaurant') !!}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="resto-heading">
                            <img src="{!! asset('frontend/images/') !!}/partner-with-us/icon-1.svg" alt="">
                            <h1>Add Restaurant</h1>
                        </div>
                        <div class="basic-info">
                            <h4>Basic Info</h4>
                            <div class="form-group">
                                <label for="nameRestaurant">Restaurant Name*</label>
                                <input type="text" class="video-form" id="nameRestaurant" placeholder="Enter Restaurant Name" name="restaurant_name" value="{!! old('restaurant_name') !!}">
                                @error('restaurant_name')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="searchCity">City*</label>
                                <input type="Search" class="video-form" id="searchCity" placeholder="Search City" name="city" value="{!! old('city') !!}">
                                @error('city')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Are you the Owner or Manager of the Place?</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" id="c1" name="creator_designation" value="1">
                                            <label for="c1">I’m the owner</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="c2" name="creator_designation" value="2">
                                            <label for="c2">I’m the manager</label>
                                        </li>
                                    </ul>
                                </div>
                                @error('creator_designation')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="basic-info">
                            <h4>Contact Info</h4>
                            <div class="form-group">
                                <label for="emailAddress">Name*</label>
                                <input type="text" class="video-form" placeholder="Full name" name="user_name" value="{!! old('user_name') !!}" required>
                                @error('user_name')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email Address*</label>
                                <input type="email" class="video-form" placeholder="Email Address" name="user_email" value="{!! old('user_email') !!}" required>
                                @error('')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telNumber1">Phone Number*</label>
                                <input type="tel" class="video-form" id="telNumber1" placeholder="Owner / Manager Phone Number" name="contact_phone" value="{!! old('contact_phone') !!}" required>
                                @error('contact_phone')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" class="video-form" placeholder="password" name="user_password" value="{!! old('user_password') !!}" required>
                                @error('user_password')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telNumber2">Restaurant Phone Number*</label>
                                <input type="tel" class="video-form" id="telNumber2" placeholder="Restaurant Phone Number" name="restaurant_phone" value="{!! old('restaurant_phone') !!}" required>
                                @error('restaurant_phone')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="webSite">Restaurant Website*</label>
                                <input type="text" class="video-form" id="webSite" placeholder="Restaurant Website" name="restaurant_website" value="{!! old('restaurant_website') !!}">
                                @error('restaurant_website')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Open Status*</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" id="c3" name="open_status" value="1">
                                            <label for="c3">This place already open</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="c4" name="open_status" value="2">
                                            <label for="c4">This place is opening soon</label>
                                        </li>
                                    </ul>
                                </div>
                                @error('open_status')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="basic-info">
                            <h4>Timing</h4>
                            <div class="form-group">
                                <div class="checkbox-title">Add Time*</div>
                                <div class="filter-checkboxs">
                                    <ul>
                                        <table class="table table-sm table-collapsed" id="time_table">

                                            <!-- Monday -->
                                            <?php 
                                                $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
                                                for($i = 1; $i <= 7; $i++){ ?>

                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="d<?=$i?>" value="1" name="{{$days[$i-1]}}_day">
                                                            <label for="d<?=$i?>" title="Monday"><?=$days[$i-1]?></label>
                                                        </td>   
                                                        <td>
                                                            <input type="text" name="{{$days[$i-1]}}_time_from" class="timepicker"/>

                                                            {{--<select class="selectpicker" tabindex="-98" name="{{$days[$i-1]}}_time_from">
                                                                <option value="12">12.00 AM</option>
                                                                <option value="1">01.00 AM</option>
                                                                <option value="2">02.00 AM</option>
                                                                <option value="3">03.00 AM</option>
                                                                <option value="4">04.00 AM</option>
                                                                <option value="5">05.00 AM</option>
                                                                <option value="6">06.00 AM</option>
                                                                <option value="7">07.00 AM</option>
                                                                <option value="8">08.00 AM</option>
                                                                <option value="9">09.00 AM</option>
                                                                <option value="9">10.00 AM</option>
                                                                <option value="9">11.00 AM</option>
                                                            </select>        --}}
                                                        </td>
                                                        <td>to</td>
                                                        <td>
                                                            <input type="text" name="{{$days[$i-1]}}_time_to" class="timepicker"/>

                                                            {{--<select class="selectpicker" tabindex="-98" name="{{$days[$i-1]}}_time_to">
                                                                <option value="12">12.00 PM</option>
                                                                <option value="1">01.00 PM</option>
                                                                <option value="2">02.00 PM</option>
                                                                <option value="3">03.00 PM</option>
                                                                <option value="4">04.00 PM</option>
                                                                <option value="5">05.00 PM</option>
                                                                <option value="6">06.00 PM</option>
                                                                <option value="7">07.00 PM</option>
                                                                <option value="8">08.00 PM</option>
                                                                <option value="9">09.00 PM</option>
                                                                <option value="9">10.00 PM</option>
                                                                <option value="9">11.00 PM</option>
                                                            </select>--}}
                                                        </td>
                                                    </tr>


                                            <?php 
                                                }
                                            ?>
                                        </table>
                                    </ul>
                                    @error('active_days')
                                        <p class="text-info">{!! $message !!}</p>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="basic-info c-top">
                            <h4>Location</h4>
                            <div class="form-group">
                                <label for="addressInput">Enter Address*</label>
                                <div class="field-input">
                                    <input type="text" class="video-form" id="addressInput" placeholder="Enter the address" name="restaurant_address" value="{!! old('restaurant_address') !!}">
                                    <i class="fas fa-search"></i>
                                    @error('restaurant_address')
                                        <p class="text-info">{!! $message !!}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="search-map-location">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6848.588137286094!2d75.8069355495411!3d30.878433570394723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a822f25912599%3A0xa51f780d31824240!2sShaheed+Bhagat+Singh+Nagar%2C+Ludhiana%2C+Punjab!5e0!3m2!1sen!2sin!4v1556363627043!5m2!1sen!2sin" style="border:0" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="basic-info c-top">
                            <h4>Characteristics</h4>
                            <div class="form-group">
                                <div class="checkbox-title">Services*</div>
                                <div class="filter-checkboxs">
                                    <ul>
                                        @foreach($restaurant_services as $service)
                                            <li>
                                                <input type="checkbox" id="cs{{ $loop->iteration }}" name="characteristices[]" value="{{ $service->id }}">
                                                <label for="cs{{ $loop->iteration }}" title="Monday">{{ $service->name }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('characteristices')
                                        <p class="text-info">{!! $message !!}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Alcohal*</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" id="c5" name="alcohol_status" value="1">
                                            <label for="c5"> Serve</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="c6" name="alcohol_status" value="2">
                                            <label for="c6"> Not Serve</label>
                                        </li>
                                    </ul>
                                    @error('alcohol_status')
                                        <p class="text-info">{!! $message !!}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Seating*</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" value="1" id="c7" name="seating_status">
                                            <label for="c7">Available</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="2" id="c8" name="seating_status">
                                            <label for="c8">Not Available</label>
                                        </li>
                                    </ul>
                                    @error('seating_status')
                                        <p class="text-info">{!! $message !!}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Cuisines*</div>
                                <select class="selectpicker" tabindex="-98" name="cuisines" required>
                                    <option value="">Select Cuisines</option>
                                    @foreach($cuisines as $cuisine)
                                        <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                                    @endforeach
                                </select>
                                @error('cuiseines')
                                    <p class="text-info">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Tags*</div>
                                <select class="selectpicker" tabindex="-98" name="tags" required>
                                    <option value="">Select Tags</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
           
                                </select>
                            </div>
                        </div>
                        <div class="basic-info c-top">
                            <h4>Payment</h4>
                            <div class="form-group">
                                <div class="checkbox-title">Payment Method*</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" value="1" id="c9" name="payment_method">
                                            <label for="c9">Cash Only</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="2" id="c10" name="payment_method">
                                            <label for="c10">Cash/cards</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="add-resto-btn1 btn-link">Add Restaurant</button>
                    </div>
                    <div class="col-lg-5 col-md-4 col-12">
                        <div class="new-heading">
                            <h1>How It Works</h1>
                        </div>
                        <div class="how-it-work-1">
                            <img src="{!! asset('frontend/images/') !!}/add-restaurant/icon-1.svg" alt="">
                            <h4>Fill Form</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet leo id enim mollis volutpat. Donec venenatis</p>
                        </div>
                        <div class="how-it-work-1">
                            <img src="{!! asset('frontend/images/') !!}/add-restaurant/icon-2.svg" alt="">
                            <h4>Send Information</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet leo id enim mollis volutpat. Donec venenatis</p>
                        </div>
                        <div class="how-it-work-1 m-bottom">
                            <img src="{!! asset('frontend/images/') !!}/add-restaurant/icon-3.svg" alt="">
                            <h4>Verified Listing & Start Working With Natto</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet leo id enim mollis volutpat. Donec venenatis</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!--add-restaurant end-->

    
@endsection

@section('custom_script')
    <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
    <script src="{!! asset('frontend') !!}/js/custom/weekedpicker.js"></script>
@endsection
