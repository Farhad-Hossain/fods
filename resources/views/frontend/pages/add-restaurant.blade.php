@extends('frontend.master')


@section('main_content')

    <!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
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
        <form>
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
                                <input type="text" class="video-form" id="nameRestaurant" placeholder="Enter Restaurant Name">
                            </div>
                            <div class="form-group">
                                <label for="searchCity">City*</label>
                                <input type="Search" class="video-form" id="searchCity" placeholder="Search City">
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Are you the Owner or Manager of the Place?</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" id="c1" name="cb1">
                                            <label for="c1">I’m the owner</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="c2" name="cb1">
                                            <label for="c2">I’m the manager</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="basic-info">
                            <h4>Contact Info</h4>
                            <div class="form-group">
                                <label for="emailAddress">Email Address*</label>
                                <input type="email" class="video-form" id="emailAddress" placeholder="Restaurant Email Address">
                            </div>
                            <div class="form-group">
                                <label for="telNumber1">Phone Number*</label>
                                <input type="tel" class="video-form" id="telNumber1" placeholder="Owner / Manager Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="telNumber2">Restaurant Phone Number*</label>
                                <input type="tel" class="video-form" id="telNumber2" placeholder="Restaurant Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="webSite">Restaurant Website*</label>
                                <input type="text" class="video-form" id="webSite" placeholder="Restaurant Website">
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Open Status*</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" id="c3" name="cb2">
                                            <label for="c3">This place already open</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="c4" name="cb2">
                                            <label for="c4">This place is opening soon</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="basic-info">
                            <h4>Timing</h4>
                            <div class="form-group">
                                <div class="checkbox-title">Add Time*</div>
                                <div class="filter-checkboxs">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="c21" name="ca">
                                            <label for="c21" title="Monday">Mon</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c22" name="ca">
                                            <label for="c22" title="Tuesday">Tue</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c23" name="ca">
                                            <label for="c23" title="Wednesday">Wed</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c24" name="ca">
                                            <label for="c24" title="Thursday"> Thu</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c25" name="ca">
                                            <label for="c25" title="Friday">Fri</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c26" name="cb">
                                            <label for="c26" title="Saturday">Sat</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c27" name="ca">
                                            <label for="c27" title="Sunday">Sun</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <div class="checkbox-title">From*</div>
                                        <select class="selectpicker" tabindex="-98">
                                            <option value="0">12.00 AM</option>
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
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <div class="checkbox-title">To*</div>
                                        <select class="selectpicker" tabindex="-98">
                                            <option value="0">12.00 PM</option>
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
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <button class="add-time-btn">Add Time</button>
                                </div>
                                <div class="col-md-12">
                                    <div class="selected-time">
                                        <ul>
                                            <li>Monday</li>
                                            <li>9.00AM to 11.00PM</li>
                                            <li><a href="#"><i class="far fa-window-close"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="basic-info c-top">
                            <h4>Location</h4>
                            <div class="form-group">
                                <label for="addressInput">Enter Address*</label>
                                <div class="field-input">
                                    <input type="text" class="video-form" id="addressInput" placeholder="Enter the address">
                                    <i class="fas fa-search"></i>
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
                                        <li>
                                            <input type="checkbox" id="c28" name="cb">
                                            <label for="c28" title="Monday">Breakfast</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c29" name="cb">
                                            <label for="c29" title="Tuesday">Lunch</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c30" name="cb">
                                            <label for="c30" title="Wednesday">Dinner</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c31" name="cb">
                                            <label for="c31" title="Thursday">Cafe's</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="c32" name="cb">
                                            <label for="c32" title="Friday">Nightlife</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Alcohal*</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" value="value1" id="c5" name="c3">
                                            <label for="c5"> Serve</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="value2" id="c6" name="c3">
                                            <label for="c6"> Not Serve</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Seating*</div>
                                <div class="filter-radio">
                                    <ul>
                                        <li>
                                            <input type="radio" value="value3" id="c7" name="c4">
                                            <label for="c7">Available</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="value4" id="c8" name="c4">
                                            <label for="c8">Not Available</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Cuisines*</div>
                                <select class="selectpicker" tabindex="-98">
                                    <option value="0">Select Cuisines</option>
                                    <option value="1">Pizza</option>
                                    <option value="2">Cakes & Desserts</option>
                                    <option value="3">Sushi</option>
                                    <option value="4">Fast Food</option>
                                    <option value="5">Fish</option>
                                    <option value="6">Lunch</option>
                                    <option value="7">Coffee Cafe’s</option>
                                    <option value="8">Cheese Tika</option>
                                    <option value="9">Samosa and Pakodas</option>
                                    <option value="10">Chinese</option>
                                    <option value="11">Drinks & Beer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-title">Tags*</div>
                                <select class="selectpicker" tabindex="-98">
                                    <option value="0">Select Tags</option>
                                    <option value="1">Lunch</option>
                                    <option value="2">Dinner</option>
                                    <option value="3">Breakfast</option>
                                    <option value="4">Fast Food</option>
                                    <option value="5">Non Veg</option>
                                    <option value="6">Veg</option>
                                    <option value="7">Pakodas & Samosas</option>
                                    <option value="8">Beer bar</option>
                                    <option value="9">Samosa and Pakodas</option>
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
                                            <input type="radio" value="value5" id="c9" name="c5">
                                            <label for="c9">Cash Only</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="value6" id="c10" name="c5">
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