@extends('layouts.layout')

@section('content')

<!-- start banner Area -->

<section class="banner-area relative">
	<div class="overlay overlay-bg"></div>
	<div class="container fullscreen">
		<div class="row h-75 align-items-center justify-content-center">
			<div class="col 12.col-md-8">
				<h6 class="text-white">Away from Booking hustle</h6>
				<h1 class="text-white">Theatre of Dreams</h1>
				<p class="text-white">
					Booking bus tickets has never been easier!
					<!--	<a href="#" class="primary-btn text-uppercase">Get Started</a>-->
			</div>
		</div>

		<div class="row justify-content-md-center">
			<div class="col 6.col-md-12">
				{{-- <div class="container" style="padding: 20px;"> --}}
				<div class="card" style="padding: 20px;">
					<div class="card-title mt-3">
						<h3 class="text-blue">Book your bus</h3>
					</div>
					<form class="form-inline" action="" method="post">
						<div class="form-group">
							<div class="col-sm-4">
								<input id="departure" type="text" list="departures" class="form-control"
									name="departure" placeholder="Where From">
								<datalist id="departures">
									@foreach ($schedules as $schedule)
									<option value="{{ $schedule->origins->name }}" data-value="{{ $schedule->origin }}">
									</option>
									@endforeach
								</datalist>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<input id="destination" type="text" list="destinations" class="form-control"
									name="destination" placeholder="Where To">
								<datalist id="destinations">
									@foreach ($schedules as $schedule)
									<option value="{{ $schedule->destinations->name }}"
										data-value="{{ $schedule->destination }}"></option>
									@endforeach
								</datalist>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<input id="date" type="date" class="form-control" name="date" placeholder="Date">
							</div>
						</div>
						<button id="search" type="button" class="btn-log">Search
						</button>
						{{-- <div class="search-widget">
							<button id="search" type="button" class="btn btn-info">
								<span class="glyphicon glyphicon-search"></span> Search
							</button>
						</div> --}}
					</form>
				</div>
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
		</div>
</section>
@if(Session::has('status'))
<p class="alert alert danger">{{ Session::get('status') }}</p>
@endif

<!-- End price Area -->
@endsection

@section('scripts')
@parent
<script src={{ asset( "js/home-page.js") }} defer></script>
@endsection