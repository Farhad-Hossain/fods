@extends('frontend.master')

@section('custom_style')
    
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
					<h3>Add Driver</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Driver</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END::Title bar-->
	<!--BEGIN::Add Driver-->
	<section class="add-restaurant">			
	<form action="{{ route('frontend.add-driver') }}" method="POST">
		@csrf
		<div class="container">					
			<div class="row justify-content-between">
				<div class="col-lg-6 col-md-8 col-12">
					<div class="resto-heading">
						<img src="images/partner-with-us/icon-2.svg" alt="">
						<h1>Add Driver</h1>
					</div>
					<div class="basic-info">
						<h4>Basic Info</h4>						
						<div class="form-group">
							<label>Your Name</label>
							<input type="text" class="video-form" placeholder="Name" name="name" required value="{{ old('name') }}">
							@error('name')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group">
							<label>City*</label>
							<input type="text" class="video-form" placeholder="Your City" name="city" required value="{{ old('city') }}">		
						</div>
					</div>
					<div class="basic-info">
						<h4>Contact Info</h4>
						<div class="form-group">
							<label for="emailAddress">Email Address*</label>
							<input type="email" class="video-form" id="emailAddress" placeholder="Enter Email Address" name="email" required value="{{ old('email') }}">							
							@error('email')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group">
							<label for="phoneNumber">Phone Number*</label>
							<input type="text" class="video-form" id="phoneNumber" placeholder="Enter Phone Number" name="phone" required value="{{ old('phone') }}">
							@error('phone')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group">
							<label for="password">Passord*</label>
							<input type="password" class="video-form" id="password" placeholder="Enter Password" name="password" required value="{{ old('password') }}">
							@error('password')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>						
						<div class="form-group">
							<div class="checkbox-title">Do You Have a Bike?* <span style="color:#a1a1a1;">(Only 2 wheeler vehicles?)</span></div>
							<div class="filter-radio">
								<ul>
									<li>
									  <input type="radio" id="c3" value="1" name="have_bike">
									  <label for="c3">I have a bike</label>
									</li>
									<li>
									  <input type="radio" id="c4" value="2" name="have_bike">
									  <label for="c4">Buy soon</label>
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
									<table class="table table-sm table-collapsed" id="time_table">

									    <!-- Monday -->
									    <?php 
									        $days = ['Mon','Tue','Wed','Thu','Fri','Sut','Sun'];
									        for($i = 1; $i <= 7; $i++){ ?>

									            <tr>
									                <td>
									                    <input type="checkbox" id="d<?=$i?>" value="1" name="{{$days[$i-1]}}_day">
									                    <label for="d<?=$i?>" title="Monday"><?=$days[$i-1]?></label>
									                </td>   
									                <td>
									                    <select class="selectpicker" tabindex="-98" name="{{$days[$i-1]}}_time_from">
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
									                    </select>        
									                </td>
									                <td>to</td>
									                <td>
									                    <select class="selectpicker" tabindex="-98" name="{{$days[$i-1]}}_time_to">
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
									                    </select>
									                </td>
									            </tr>


									    <?php 
									        }
									    ?>
									</table>									
								</ul>
							</div>
						</div>
					</div>					
					<div class="basic-info c-top">
						<h4>More Details</h4>												
						<div class="form-group">
							<div class="checkbox-title">Working Details*</div>
							<div class="filter-radio">
								<ul>
									<li>
									  <input type="radio" value="3" id="c5" name="working_under">
									  <label for="c5">Working under 3 km</label>
									</li>
									<li>
									  <input type="radio" value="5" id="c6" name="working_under">
									  <label for="c6">Working under 5 km</label>
									</li>
									<li>
									  <input type="radio" value="8" id="c7" name="working_under">
									  <label for="c7">Working under 8 km</label>
									</li>
								</ul>
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox-title">Earning*</div>
							<div class="filter-radio">
								<ul>
									<li>
									  <input type="radio" value="1" id="c7" name="earning_style">
									  <label for="c7">Every order commission</label>
									</li>
									<li>
									  <input type="radio" value="2" id="c8" name="earning_style">
									  <label for="c8">Monthly Salary</label>
									</li>
								</ul>
							</div>
						</div>	
						<div class="form-group">
							<div class="checkbox-title">Registered By Company*</div>
							<div class="filter-radio">
								<ul>
									<li>
									  <input type="radio" value="2" id="c9" name="registered_by">
									  <label for="c9">Uber</label>
									</li>
									<li>
									  <input type="radio" value="3" id="c10" name="registered_by">
									  <label for="c10">Ola Cab</label>
									</li>
									<li>
									  <input type="radio" value="1" id="c11" name="registered_by">
									  <label for="c11">None</label>
									</li>
								</ul>
							</div>
						</div>
						
						
					</div>					
					<button type="submit" class="add-resto-btn1 btn-link">Add As Driver</button>
				</div>
				<div class="col-lg-5 col-md-4 col-12">
					<div class="new-heading">						
						<h1>How It Works</h1>
					</div>
					<div class="how-it-work-1">
						<img src="images/add-restaurant/icon-1.svg" alt="">
						<h4>Fill Form</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet leo id enim mollis volutpat. Donec venenatis</p>
					</div>
					<div class="how-it-work-1">
						<img src="images/add-restaurant/icon-2.svg"  alt="">
						<h4>Send Information</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet leo id enim mollis volutpat. Donec venenatis</p>
					</div>
					<div class="how-it-work-1 m-bottom">
						<img src="images/add-restaurant/icon-3.svg"  alt="">
						<h4>Verified Listing & Start Working With Natto</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet leo id enim mollis volutpat. Donec venenatis</p>
					</div>
				</div>
			</div>							
		</div>
	</form>	
	</section>
	<!--END::Add-Driver-->
@endsection