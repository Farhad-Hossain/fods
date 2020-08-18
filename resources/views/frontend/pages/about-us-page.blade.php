@extends('frontend.master', ['title'=>'About Us'])
@section('main_content')
	<!--title-bar start-->
	<section class="title-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left-title-text">
						<h3>About us</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">About Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--title-bar end-->	
	<!--what-is-natto start-->
	<section class="about-natto">			
		<div class="container">		
			<div class="row">	
				<div class="col-md-12">
					<div class="new-heading">
						<h1> What is Natto? </h1>
					</div>						
				</div>
				<div class="col-md-12">
					<div class="about-text1">
						<p>Vivamus tortor nisl, lobortis in, faucibus et, tempus at, dui. Nunc risus. Proin scelerisque augue. Nam ullamcorper. Phasellus id massa. Pellentesque nisl. Pellentesque habitant tuni morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc augue. Aenean sed justo non leo vehicula laoreet. Praesent ipsum libero, auctor ac, tempus nec, casion tempor nec, justo cretusi sino zumbua iloseum musumfu lilokuta nabase uchiha itachi suctung from munual pracetamol curom ose testio soel lorem isutm pausm mintest osrit ucii. </p>
					</div>
					<div class="about-text2">
						<p> Maecenas ullamcorper, odio vel tempus egestas, dui orci faucibus orci, sit amet aliquet lectus dolor et quam. Pellentesque consequat luctus purus. Nunc et risus. Etiam a nibh tunil Phasellus dignissim metus eget nisi. Vestibulum sapien dolor, aliquet nec, porta ac, malesuada a, libero. Praesent feugiat purus eget est. Nulla facilisi. Vestibulum tincidunt sapiens eu velit. Mauris purus. Maecenas eget mauris eu orci accumsan feugiat. Pellentesque eget velit. Nunc tincidunt. </p>
					</div>						
				</div>
			</div>
			<div class="row">	
				<div class="col-md-3 col-sm-12">
					<div class="about-item">
					<img src="images/about/icon_1.svg" alt="">
					<h4>Search</h4>
					<p> Nunc et risus. Etiam a nibh tunil Phasellus dignissim metus.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="about-item">
					<img src="images/about/icon_2.svg" alt="">
					<h4>Choose</h4>
					<p> Nunc et risus. Etiam a nibh tunil Phasellus dignissim metus.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="about-item">
					<img src="images/about/icon_3.svg" alt="">
					<h4>Pay</h4>
					<p> Nunc et risus. Etiam a nibh tunil Phasellus dignissim metus.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="about-item">
					<img src="images/about/icon_4.svg" alt="">
					<h4>Enjoy</h4>
					<p> Nunc et risus. Etiam a nibh tunil Phasellus dignissim metus.</p>
					</div>
				</div>
			</div>
			<div class="order-now-btn">
				<a href="meals.html" class="m-btn btn-link">Order Now</a>
			</div>
		</div>
	</section>
	<!--what-is-natto end-->
	<!--download-link start-->
	<section class="app-block-preview">			
			<div class="container">
				<div class="row">	
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="pocket-items">
							<div class="new-heading">
								<h1>Our App</h1>
							</div>
							<div class="line">
								<img src="images/homepage/line.svg" alt="">
							</div>
							<p>We’ll send you a link, open it on your phone to download the app.</p>
							<form class="search-form">
								<input type="text" class="send-link" placeholder="Enter your email address">
								<button type="submit" class="pocket-btn">Send Link</button>
							</form>
							<div class="download-btns">
								<a href="#"><img src="images/homepage/app-store.png" alt=""></a>
								<a href="#"><img src="images/homepage/play-store.png" alt=""></a>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="about-video">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/0SPwwpruGIA" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!--download-link end-->	
	<!--active-in-30-countries Start-->
	<section class="active-countries">			
		<div class="container">
			<div class="row">	
				<div class="col-md-12">					
					<div class="new-heading p-heading">
						<h1>Active in 30 Countries</h1>
					</div>
				</div>
			</div>
			<div class="countries">
				<div class="row">				
					<div class="col-md-2 col-sm-12">
						<ul>
							<li><a href="#">India</a></li>
							<li><a href="#">Australia</a></li>
							<li><a href="#">USA</a></li>
							<li><a href="#">Italy</a></li>
							<li><a href="#">Canada</a></li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-12">
						<ul>
							<li><a href="#">Iraq</a></li>
							<li><a href="#">Libiya</a></li>
							<li><a href="#">UK</a></li>
							<li><a href="#">Turkey</a></li>
							<li><a href="#">Ireland</a></li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-12">
						<ul>
							<li><a href="#">Poland</a></li>
							<li><a href="#">Qatar</a></li>
							<li><a href="#">UAE</a></li>
							<li><a href="#">Portugal</a></li>
							<li><a href="#">Lebanon</a></li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-12">
						<ul>
							<li><a href="#">Brazil</a></li>
							<li><a href="#">Sri Lanka</a></li>
							<li><a href="#">Nepal</a></li>
							<li><a href="#">bangladesh</a></li>
							<li><a href="#">China</a></li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-12">
						<ul>
							<li><a href="#">The Philipines</a></li>
							<li><a href="#">Singapur</a></li>
							<li><a href="#">Malaysia</a></li>
							<li><a href="#">Indonasia</a></li>
							<li><a href="#">South Africa</a></li>
						</ul>
					</div>
					<div class="col-md-2 col-sm-12">
						<ul>
							<li><a href="#">Japan</a></li>
							<li><a href="#">New Zealand</a></li>
							<li><a href="#">West Indies</a></li>
							<li><a href="#">Chile</a></li>
							<li><a href="#">Austaria</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--active-in-30-countries end-->	
	<!--our-team Start-->
	<section class="our-team">			
		<div class="container">
			<div class="row">	
				<div class="col-md-12">					
					<div class="new-heading">
						<h1>Our Team</h1>
					</div>
				</div>
			</div>	
			<div class="team">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="team-1">
							<div class="team-img">
								<img src="images/about/team-1.jpg" alt="">
							</div>
							<h4> John Doe </h4>
							<p> Co-Founder </p>
							<div class="social-btns">
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-facebook-f"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-twitter"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-instagram"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-linkedin-in"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-youtube"></i></div></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="team-1">
							<div class="team-img">
								<img src="images/about/team-2.jpg" alt="">
							</div>
							<h4> Rock Smith </h4>
							<p> Founder </p>
							<div class="social-btns">
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-facebook-f"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-twitter"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-instagram"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-linkedin-in"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-youtube"></i></div></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="team-1">
							<div class="team-img">
								<img src="images/about/team-3.jpg" alt="">
							</div>
							<h4> Jassica William </h4>
							<p> Manager </p>
							<div class="social-btns">
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-facebook-f"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-twitter"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-instagram"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-linkedin-in"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-youtube"></i></div></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="team-1">
							<div class="team-img">
								<img src="images/about/team-4.jpg" alt="">
							</div>
							<h4> Johnson </h4>
							<p> Marketing Manager </p>
							<div class="social-btns">
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-facebook-f"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-twitter"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-instagram"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-linkedin-in"></i></div></a>
								<a href="#"><div class="social-btn soc-btn"><i class="fab fa-youtube"></i></div></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--our team end-->
	
	<!--over-15000-restaurants start-->
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
@endsection
