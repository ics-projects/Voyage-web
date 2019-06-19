@extends('layouts.layout')

@section('content')
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Log In
                </h1>
                <p class="text-white link-nav"> Do you have an account?<span class="lnr lnr-arrow-right"></span>
                    <a href="{{ url('/register') }}">Create Account</a></p></a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<section class="section-gap">
    <div class="container">
        <div class="card bg-light">
            <h4 class="card-title mt-3 text-center">{{ __('Login') }}</h4>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="Enter Email Address" type="email">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="Type password" type="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8">
                            <button type="submit" class="btn-log">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>

            </form>
            </article>
        </div>
</section>
@endsection