<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Book seat</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="../css/linearicons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/main.css">

    <link rel="stylesheet" type="text/css" href="../css/jquery.seat-charts.css" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="../js/jquery-1.11.0.min.j"></script>
    <script src="../js/jquery.seat-charts.js"></script>
</head>

<body>
    <header id="header">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                        <a class="navbar-brand" href="index.html">Voyage Bus</a>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                        <ul>
                            <li><a href="log in.html">LOG IN</a></li>
                            <li><a href="signup.html">SIGN UP</a></li>
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
                        <li><a href=index.html>Home</a></li>
                        <li><a href=about.html>About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </div>
    </header>
    <!-- #header -->

    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Book your Seat
                    </h1>
                    <p class="text-white link-nav"> Do you have an account?<span class="lnr lnr-arrow-right"></span> <a href="signup.html">Create Account</a></p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-gap">
        <div class="container">
            <div class="main">
                <h2>Book Your Seat Now?</h2>
                <div class="wrapper">
                    <div id="seat-map">
                        <div class="front-indicator">Front</div>
                    </div>
                    <div class="booking-details">
                        <div id="legend"></div>
                        <h2>Booking Details</h2>
                        <h3> Selected Seats (<span id="counter">0</span>):</h3>
                        <ul id="selected-seats" class="scrollbar scrollbar1">
                        </ul>
                        Total: <b>Ksh<span id="total">0</span></b>
                        <button class="checkout-button">Checkout</button>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var firstSeatLabel = 1;

        $(document).ready(function() {
            var $cart = $('#selected-seats'),
                $counter = $('#counter'),
                $total = $('#total'),
                sc = $('#seat-map').seatCharts({
                    map: [
                        'ff_ff',
                        'ff_ff',
                        'ee_ee',
                        'ee_ee',
                        'ee___',
                        'ee_ee',
                        'ee_ee',
                        'ee_ee',
                        'eeeee',
                    ],
                    seats: {
                        f: {
                            price: 1500,
                            classes: 'first-class', //your custom CSS class
                            category: 'First Class'
                        },
                        e: {
                            price: 800,
                            classes: 'economy-class', //your custom CSS class
                            category: 'Economy Class'
                        }

                    },
                    naming: {
                        top: false,
                        getLabel: function(character, row, column) {
                            return firstSeatLabel++;
                        },
                    },
                    legend: {
                        node: $('#legend'),
                        items: [
                            ['f', 'available', 'First Class'],
                            ['e', 'available', 'Economy Class'],
                            ['f', 'unavailable', 'Already Booked']
                        ]
                    },
                    click: function() {
                        if (this.status() == 'available') {
                            //a new <li> which we'll add to the cart items
                            $('<li>' + this.data().category + ' : Seat no ' + this.settings.label + ': <b>Ksh' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                .attr('id', 'cart-item-' + this.settings.id)
                                .data('seatId', this.settings.id)
                                .appendTo($cart);

                            $counter.text(sc.find('selected').length + 1);
                            $total.text(recalculateTotal(sc) + this.data().price);

                            return 'selected';
                        } else if (this.status() == 'selected') {
                            //update the counter
                            $counter.text(sc.find('selected').length - 1);
                            //and total
                            $total.text(recalculateTotal(sc) - this.data().price);

                            //remove the item from cart
                            $('#cart-item-' + this.settings.id).remove();

                            //seat has been vacated
                            return 'available';
                        } else if (this.status() == 'unavailable') {
                            //seat has been already booked
                            return 'unavailable';
                        } else {
                            return this.style();
                        }
                    }
                });
            $('#selected-seats').on('click', '.cancel-cart-item', function() {
                sc.get($(this).parents('li:first').data('seatId')).click();
            });
        });

        function recalculateTotal(sc) {
            var total = 0;

            sc.find('selected').each(function() {
                total += this.data().price;
            });

            return total;
        }
    </script>
    <footer class="footer-area section-gap">
        <div class="container">

            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Agency</h6>
                        <p>A bus booking agency that ensures safety, convinient and ease ofbooking nus tickets Travel makes one modest. You see what a tiny place you occupy in the world
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
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
            </div>
        </div>
    </footer>

    <!-- End footer Area -->

    <script src="../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/easing.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.nicescroll.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/jquery.nicescroll.js"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>