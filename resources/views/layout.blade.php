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
                            <li><a href="#">LOG IN</a></li>
                            <li><a href="#">SIGN UP</a></li>
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

        @yield('content')
        
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