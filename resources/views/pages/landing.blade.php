@extends('layouts.layout')
<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    <ul>
                        <li><a href="#">Visit Us</a></li>
                        <li><a href="#">Buy Tickets</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">

                    <ul>
                        <li><a href="{{ url('/login') }}">LOG IN</a></li>
                        <li><a href="{{ url('/register') }}">REGISTER</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <!--<a href="index.html"><img src="img/logo.png" alt="" title="" /></a>-->
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href=#>Home</a></li>
                    <li><a href=#>About</a></li>
                    <li><a href=#>Packages</a></li>
                    <li><a href=hotels.html>Destinations</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </div>
</header>

@section('content')
<!-- start banner Area -->
<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6 banner-left">
                <h6 class="text-white">Away from monotonous life</h6>
                <h1 class="text-white">Magical Experience</h1>
                <p class="text-white">
                    Booking bus tickets has never been easier!
                    <!--	<a href="#" class="primary-btn text-uppercase">Get Started</a>-->
            </div>
            <div class="col-lg-4 col-md-6 banner-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                        <form class="form-wrap">
                            <div class="row align-items-center">
                                <li class="nav-item">
                                    <p>Book Your Bus</p>
                                </li>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="where from " onfocus="this.placeholder = ''" onblur="this.placeholder = 'from '">
                            <input type="text" class="form-control" name="to" placeholder="where to " onfocus="this.placeholder = ''" onblur="this.placeholder = ' To '">
                            <input type="text" class="form-control date-picker" name="start" placeholder="Date " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date '">
                            <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults " onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Adults '">
                            <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child " onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Child '">
                            <a href="#" class="primary-btn text-uppercase">Search Buses</a>
                        </form>
                    </div>
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
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-destination relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src= {{ asset("img/d1.jpg") }} alt="">
                    </div>
                    <div class="desc">
                        <a href="#" class="price-btn">Ksh.3000</a>
                        <h4>Coast</h4>
                        <p>Mombasa</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destination relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src={{ asset("img/d2.jpg") }} alt="">
                    </div>
                    <div class="desc">
                        <a href="#" class="price-btn">Ksh.2500</a>
                        <h4>Western Kenya</h4>
                        <p>Kisumu</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-destination relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src={{ asset("img/d3.jpg") }} alt="">
                    </div>
                    <div class="desc">
                        <a href="#" class="price-btn">Ksh.1500</a>
                        <h4>Rift Valley</h4>
                        <p>Nanyuki</p>
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
                    <h1 class="mb-10">We Provide Affordable Prices</h1>
                </div>
            </div>
            <div class="row">
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
@endsection