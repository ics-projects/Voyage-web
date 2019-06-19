@extends('layouts.layout')

<style>
    .nav-item {}
</style>

@section('content')
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    @if (Auth::check())
                    Welcome {{Auth::user()->first_name}}
                    @endif
                </h1>
                <p class="text-white link-nav">This is your profile page<span class="lnr lnr-arrow-right"></span></p>
            </div>
        </div>
    </div>
</section>

<div class="section-gap">
    <div class="container">
        <ul id="nav-tabs" class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="accounttab" role="tab" href="#accountdetails"
                    aria-selected="true">Account details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="bookingstab" role="tab" href="#bookingdetails"
                    aria-selected="false">Bookings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="settingstab" role="tab" href="#settings"
                    aria-selected="false">Settings</a>
            </li>
        </ul>
        <div class="container tab-content">
            {{-- Account details --}}
            <div class="container tab-pane show active" id="accountdetails" role="tabpanel"
                aria-labelledby="accounttab">
                <p>Account details</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user" style="font-size:24px"></i>
                                </span>
                            </div>
                            <input name="last_name"
                                class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                placeholder="Last Name" type="text">
                            @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user" style="font-size:24px"></i>
                                </span>
                            </div>
                            <input name="last_name"
                                class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                placeholder="Last Name" type="text">
                            @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </form>
                </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                </form>
            </div>

            {{-- Booking tabs --}}
            <div class="container tab-pane" id="bookingdetails" role="tabpanel" aria-labelledby="bookingstab">
                <p>Bookings</p>

            </div>

            {{-- Settings --}}
            <div class="container tab-pane" id="settings" role="tabpanel" aria-labelledby="settingstab">
                <p>Settings</p>
            </div>
        </div>
    </div>
</div>
@endsection
