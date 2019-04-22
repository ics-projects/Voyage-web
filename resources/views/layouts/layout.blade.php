<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    @include('includes.head')
</head>

<body>
    {{--
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                            Voyage Transit
                        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav> --}}

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