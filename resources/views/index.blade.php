@extends('layouts.layout')
<body>
	<!-- start banner Area -->

	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container fullscreen">
			<div class="row h-75 align-items-center justify-content-center">
				<div class="col 12.col-md-8">
					<h6 class="text-white">Away from monotonous life</h6>
					<h1 class="text-white">Magical Experience</h1>
					<p class="text-white">
						Booking bus tickets has never been easier!
						<!--	<a href="#" class="primary-btn text-uppercase">Get Started</a>-->
				</div>
			</div>

			<div class="row justify-content-md-center">
				<div class="col 10.col-md-6">
					{{-- <div class="container" style="padding: 20px;"> --}}
					<div class="card bg-light" style="padding: 20px;">
						<div class="card-title mt-3">
							<h3 class="text-blue">Book your bus</h3>
						</div>
						<form class="form-inline" action="index.html" method="post">
							<div class="form-group">
								<div class="col-sm-4">
									<input type="text" class="form-control" name="from" placeholder="Where From">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<input type="text" class="form-control" name="destination" placeholder="Where to">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<input type="date" class="form-control" name="date" placeholder="Date">
								</div>
							</div>
							<div class="search-widget">
								<button type="button" class="btn btn-info">
									<span class="glyphicon glyphicon-search"></span> Search
								</button>
							</div>
						</form>
					</div>
					{{-- </div> --}}

				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start popular-destination Area -->
	<section class="popular-destination-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Popular Destinations</h1>
						<p>We all live in an age that belongs to the young at heart. Life that is becoming extremely
							fast, day.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="single-destination relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src={{ asset("img/mombasa.jpg") }} alt="mombasa">
						</div>
						<div class="desc">
							<p>Ksh.3000</p>
							<h4>Coast</h4>
							<p>Mombasa</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-destination relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src={{ asset('img/kisumu.jpg') }} alt="kisumu">
						</div>
						<div class="desc">
							<p>Ksh.2500</p>
							<h4>Western Kenya</h4>
							<p>Kisumu</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-destination relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src={{ asset('img/nairobi.jpg') }} alt="nairobi">
						</div>
						<div class="desc">
							<p>Ksh.1500</p>
							<h4>Nairobi</h4>
							<p>Nairobi</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End popular-destination Area -->


	<!-- Start price Area -->
	<section class="price-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">We Provide Affordable Prices</h1 </div> </div> </div> <div class="row">
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Cheap Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Nairobi</span>
										<a href="#" class="price-btn">Ksh.1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Mombasa</span>
										<a href="#" class="price-btn">Ksh.2000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nakuru</span>
										<a href="#" class="price-btn">Ksh.1000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nanyuki</span>
										<a href="#" class="price-btn">Ksh.1000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Kisumu</span>
										<a href="#" class="price-btn">ksh.1800</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Malindi</span>
										<a href="#" class="price-btn">Ksh.2000</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Luxury Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Nairobi</span>
										<a href="#" class="price-btn">Ksh.2000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Mombasa</span>
										<a href="#" class="price-btn">Ksh.2500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nakuru</span>
										<a href="#" class="price-btn">Ksh.1400</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nanyuki</span>
										<a href="#" class="price-btn">Ksh.1400</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Kisumu</span>
										<a href="#" class="price-btn">Ksh.1800</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Malindi</span>
										<a href="#" class="price-btn">Ksh.2000</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Camping Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Nairobi</span>
										<a href="#" class="price-btn">Ksh.70000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Mombasa</span>
										<a href="#" class="price-btn">ksh. 84000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nakuru</span>
										<a href="#" class="price-btn">Ksh. 55000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nanyuki</span>
										<a href="#" class="price-btn">ksh 57000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Kisumu</span>
										<a href="#" class="price-btn">ksh 76000</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Malindi</span>
										<a href="#" class="price-btn">Ksh.82000</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
	</section>
	<!-- End price Area -->


	<!-- Start other-issue Area -->
	<footer class="footer-area section-gap">
		<div class="container">

			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Agency</h6>
						<p>A bus booking agency that ensures safety, convinient and ease ofbooking nus tickets
							Travel makes one modest. You see what a tiny place you occupy in the world
						</p>

					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Navigation Links</h6>
						<div class="row">
							<div class="col">
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">Feature</a></li>
									<li><a href="#">Services</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<div id="mc_embed_signup">
							<form target="_blank"
								action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								method="get" class="subscription relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Email Address '" required="" type="email">
									<button class="btn bb-btn"><span class="lnr lnr-location"></span></button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Travel with Us</h6>

					</div>
				</div>
			</div>

			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-8 col-sm-12 footer-text m-0">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

					<!--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					<!--	<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>-->
	</footer>

	<!-- End footer Area -->



	<script src={{ asset("js/vendor/jquery-2.2.4.min.js") }}></script>
	<script src={{ asset("js/popper.min.js") }}></script>
	<script src={{ asset("js/vendor/bootstrap.min.js") }}></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src={{ asset("js/jquery-ui.js") }}></script>
	<script src={{ asset("js/easing.min.js") }}></script>
	<script src={{ asset("js/hoverIntent.js") }}></script>
	<script src={{ asset("js/superfish.min.js") }}></script>
	<script src={{ asset("js/jquery.ajaxchimp.min.js") }}></script>
	<script src={{ asset("js/jquery.magnific-popup.min.js") }}></script>
	<script src={{ asset("js/jquery.nice-select.min.js") }}></script>
	<script src={{ asset("js/owl.carousel.min.js") }}></script>
	<script src={{ asset("js/mail-script.js") }}></script>
	<script src={{ asset("js/main.js") }}></script>
</body>

</html>