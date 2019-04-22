<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href={{ asset("img/fav.png") }}>
        <!-- Author Meta -->
        <meta name="author" content="colorlib">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Booking Tickets</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href={{ asset("css/linearicons.css") }}>
        <link rel="stylesheet" href={{ asset("css/font-awesome.min.css") }}>
        <link rel="stylesheet" href={{ asset("css/bootstrap.css") }}>
        <link rel="stylesheet" href={{ asset("css/magnific-popup.css") }}>
        <link rel="stylesheet" href={{ asset("css/jquery-ui.css") }}>
        <link rel="stylesheet" href={{ asset("css/nice-select.css") }}>
        <link rel="stylesheet" href={{ asset("css/animate.min.css") }}>
        <link rel="stylesheet" href={{ asset("css/owl.carousel.css") }}>
        <link rel="stylesheet" href={{ asset("css/main.css") }}>
    </head>
    <body>
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
                                <div class="flex-center position-ref full-height">
                                    @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                        <a href="{{ url('/home') }}">Home</a>
                                        @else
                                        <a href="{{ route('login') }}">Login</a>
                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                        @endif
                                        @endauth
                                    </div>
                                    @endif
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
                        </nav><!-- #nav-menu-container -->

                        </div>
                    </div>

                    </header><!-- #header -->


                    <section class="banner-area relative">
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row fullscreen align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 banner-left">
                            <h6 class="text-white">Away from monotonous life</h6>
                            <h1 class="text-white">Magical Experience</h1>
                            <p class="text-white">
                                Booking bus tickets has never been easier!
                        <!--    <a href="#" class="primary-btn text-uppercase">Get Started</a>-->
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
                                    <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
                                    <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">
                                    <a href="#" class="primary-btn text-uppercase">Search Buses</a>
                                </form>
                              </div>
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
                                    <img class="img-fluid" src="img/d1.jpg" alt="">
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
                                    <img class="img-fluid" src="img/d2.jpg" alt="">
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
                                    <img class="img-fluid" src="img/d3.jpg" alt="">
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
                                <h1 class="mb-10">We Provide Affordable Prices</h1
                            </div>
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

                
                    
                    <!-- start footer Area -->
                    <footer class="footer-area section-gap">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3  col-md-6 col-sm-6">
                                    <div class="single-footer-widget">
                                        <h6>About Agency...</h6>
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
                                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
                                                <div class="input-group d-flex flex-row">
                                                    <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
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