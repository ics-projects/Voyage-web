@extends('layouts.layout')

@section('content')
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          <h1 class="text-white">
            Book Seat
          </h1>
          <p class="text-white link-nav"> <a href="">Voyage bus </a> <span class="lnr lnr-arrow-right"></span>
            <a href="about.html"> Book your seat</a></p>
        </div>
      </div>
    </div>
  </section>
<div class="section-gap">
    <div class="container">

        @foreach ($schedules as $schedule)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                     <div class="card-header"><h5>{{ $schedule->origins->name }} - {{ $schedule->destinations->name }}</h></div>
                    <div class="card-body">
                        <p class="col-md-3">Departure time: {{ $schedule->dept_time }}</p>
                        <p class="col-md-3">Cost: 25000</p>
                        <a href="/trip/{{ $schedule->trips->id }}" class="btn-log">Book Ticket</a>

                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
