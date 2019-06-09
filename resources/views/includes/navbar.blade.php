<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    <a class="navbar-brand" href={{ url('/') }}>{{ config('app.name', 'Laravel')}}</a>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                    <ul>
                        @guest
                        @if (Route::has('register'))
                        <li><a href={{ url('/signin') }}>LOG IN</a></li>
                        <li><a href={{ url('/signup') }}>SIGN UP</a></li>
                        @endif @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a class="navbar-brand" href={{ url('/') }}>VB</a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href={{ url('/') }}>Home</a></li>
                    <li><a href=about.html>About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->