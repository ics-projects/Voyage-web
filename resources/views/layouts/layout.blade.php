<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    @include('includes.head')
</head>

<body>
    @include('includes.navbar')
    <div id="main">
        @yield('content')
    </div>
    <!-- start footer Area -->
    <footer class="footer-area section-gap">
    @include('includes.footer')
    </footer>

    <script src={{ asset( "js/vendor/jquery-2.2.4.min.js") }}></script>
    <script src={{ asset( "js/popper.min.js") }}></script>
    <script src={{ asset( "js/vendor/bootstrap.min.js") }}></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src={{ asset( "js/jquery-ui.js") }}></script>
    <script src={{ asset( "js/easing.min.js") }}></script>
    <script src={{ asset( "js/hoverIntent.js") }}></script>
    <script src={{ asset( "js/superfish.min.js") }}></script>
    <script src={{ asset( "js/jquery.ajaxchimp.min.js") }}></script>
    <script src={{ asset( "js/jquery.magnific-popup.min.js") }}></script>
    <script src={{ asset( "js/jquery.nice-select.min.js") }}></script>
    <script src={{ asset( "js/owl.carousel.min.js") }}></script>
    <script src={{ asset( "js/mail-script.js") }}></script>
    <script src={{ asset( "js/main.js") }}></script>
    <script src={{ asset( "js/app.js") }} defer></script>
</body>

</html>