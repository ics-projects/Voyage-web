@extends('layouts.layout')

@section('content')
<div class="section-gap">
    <div class="container">

        @foreach ($schedules as $schedule)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $schedule->origins->name }} - {{ $schedule->destinations->name }}</h5>
                        <p class="col-md-3">Departure time: {{ $schedule->dept_time }}</p>
                        <p class="col-md-3">Cost: 25000</p>
                        <a href="/trip/{{ $schedule->trips->id }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection