@extends('layouts.layout')
<header id="header">
    @include('includes.header')
</header>

@section('content')
<div class="section-gap">
    <div class="container">

        @foreach ($trips as $trip)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $trip->schedule->origin->name }} - {{ $trip->schedule->destination->name }}</h5>
                        {{--
                        <p class="col-md-3">NRB - MBSA</p> --}}
                        <p class="col-md-3">Departure time: {{ $trip->schedule->dept_time }}</p>
                        <p class="col-md-3">Cost: 25000</p>
                        {{--
                        <p class="card-text">NRB - MBSA</p> --}}
                        <a href="/trip/{{ $trip->id }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection