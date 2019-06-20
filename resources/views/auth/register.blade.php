@extends('layouts.layout')
@section('content')
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Sign Up
                </h1>
                {{-- <p class="text-white link-nav"> <a href="index.html">Voyage bus </a> <span
                        class="lnr lnr-arrow-right"></span>
                    <a href="about.html"> About Us</a></p> --}}
            </div>
        </div>
    </div>
</section>
<section class="section-gap">
    <div class="container">
        <div class="card bg-light">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <article class="card-body mx-auto" style="max-width: 400px;">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user" style="font-size:24px"></i> </span>
                        </div>
                        <input name="first_name"
                            class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                            placeholder="First Name" type="text" value="{{ old('first_name') }}">
                        @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user" style="font-size:24px"></i> </span>
                        </div>
                        <input name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                            placeholder="Last Name" type="text" value="{{ old('last_name') }}">
                        @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="Email address" type="email" value="{{ old('email') }}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    {{-- <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 120px;">
                            <option selected="">Kenya +254</option>
                            <option value="1">Tanzania +255</option>
                            <option value="2">Uganda +256</option>
                        </select>
                        <input name="" class="form-control" placeholder="Phone number" type="text" required>
                    </div> --}}

                    {{-- <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="far fa-calendar-alt"></i> </span>
              </div>
              <input class="form-control" placeholder="Date of birth" type="date" required>
            </div> --}}

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input id="confirm" name="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="Create password" type="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input id="password-confirm" class="form-control" type="password" class="form-control"
                            name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-log">
                            {{ __('Register') }}
                        </button>
                    </div>
        </div>
    </div>
    </form>
    </article>
</section>
@endsection