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
          <p class="text-white link-nav"> <a href="index.html">Voyage bus </a> <span class="lnr lnr-arrow-right"></span>
            <a href="about.html"> About Us</a></p>
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
              <input name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                placeholder="Full name" type="text">
              @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
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

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
              </div>
              <select class="custom-select" style="max-width: 120px;">
                <option selected="">Kenya +254</option>
                <option value="1">Tanzania +255</option>
                <option value="2">Uganda +256</option>
              </select>
              <input name="" class="form-control" placeholder="Phone number" type="text" required>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="far fa-calendar-alt"></i> </span>
              </div>
              <input class="form-control" placeholder="Date of birth" type="date" required>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input id="confirm" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
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
              <input id="password-confirm" name="password-confirmation" class="form-control" placeholder="Repeat password" type="password" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">
                {{ __('Register') }}
              </button>
            </div>
      </div>
    </div>
    </form>
    </article>
  </section>
@endsection