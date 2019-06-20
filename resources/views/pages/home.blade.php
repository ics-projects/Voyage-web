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
        <ul id="nav-tabs" class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="accounttab" role="tab" href="#accountdetails"
                    aria-selected="false">Account details</a>
            </li>
            <li class="nav-item show">
                <a class="nav-link" data-toggle="tab" id="bookingstab" role="tab" href="#bookingdetails"
                    aria-selected="true">Bookings</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="settingstab" role="tab" href="#settings"
                    aria-selected="false">Settings</a>
            </li> --}}
        </ul>
        <div class="container tab-content">
            {{-- Account details --}}
            <div class="container tab-pane" id="accountdetails" role="tabpanel" aria-labelledby="accounttab">
                <br>
                <h3>Account details</h3>
                <br>
                <p>First name: {{ Auth::user()->first_name }} </p>
                <br>
                <p>Last name: {{ Auth::user()->last_name }} </p>
                <br>
                <p>Email: {{ Auth::user()->email }} </p>
                <br>
            </div>

            {{-- Booking tabs --}}
            <div class="container tab-pane show active" id="bookingdetails" role="tabpanel"
                aria-labelledby="bookingstab">
                <br>
                <h3>Bookings</h3>
                <br>
                @php
                $scheduletime = null;
                $newtime = null;
                $bookedseats[] = null;
                $seatnumber = null;

                @endphp

                @if ($count<1)
                <h4>You have no pending bookings</h4>
                {{-- {{ print_r($userbooking) }} --}}
                @else
                @foreach ($userbookings as $userbooking)
                @php
                $newtime = $userbooking->schedule;
                // echo $newtime;
                print_r($userbooking);
                @endphp

                @if ($scheduletime!=$newtime)
                <div class="card">
                    <h5 class="card-header">{{ $userbooking->schedules->origins->name }} to
                        {{ $userbooking->schedules->destinations->name }}
                    </h5>
                    <div class="card-body">
                        <h5 class="card-title">Departure time:
                            {{ $userbooking->schedules->dept_time->format('d/m/Y')  }} at
                            {{ $userbooking->schedules->dept_time->format('H:i a')  }}
                        </h5>
                        <hr>
                        <div class="card-text">
                            <ul><b>Number of seats:<span class="badge badge-primary badge-pill">{{ $count }}</span></b>
                                @foreach ($seats as $seat)
                                <li>Seat {{ $seat }} </li>
                                @endforeach
                            </ul>
                            <br>
                            <p>Arrival time: {{ $userbooking->schedules->arrival_time->format('d/m/Y  -  H:i a')  }}</p>
                            <b>Booking made: {{ $userbooking->created_at->format('d/m/Y  -  H:i a') }}</b>
                        </div>
                        <br>
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
                </div>
                @php
                $scheduletime=$newtime;
                // echo $scheduletime;
                @endphp
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection