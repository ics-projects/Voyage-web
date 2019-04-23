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
                        <h5 class="card-title">{{ $trip->bus_route->start }} - {{ $trip->bus_route->destination }}</h5>
                        {{--
                        <p class="col-md-3">NRB - MBSA</p> --}}
                        <p class="col-md-3">Departure time: {{ $trip->departure_time }}</p>
                        <p class="col-md-3">Cost: 25000</p>
                        {{--
                        <p class="card-text">NRB - MBSA</p> --}}
                        <a href="#" id="openModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{ $trip->trip_no }}">Go</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="tripPassengerForm" method="POST" action="/tripPassenger">
                                            @csrf
                                            <input id="trip_no" name="trip_no" type="text" style="display: none;" value="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="">Pick Point</label>
                                                        <select class="form-control" id="pick-point" name="pick-point">
                                                            @foreach ($stages as $stage)
                                                            <option value="{{ $stage->stage_no }}">{{ $stage->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="">Drop Point</label>
                                                        <select class="form-control" id="pick-point" name="stage_no">
                                                                @foreach ($stages as $stage)
                                                                <option value="{{ $stage->stage_no }}">{{ $stage->name }}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="submitBtn" type="submit" class="btn btn-primary pull-right" style="display: none;">Save</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                            onclick="event.preventDefault();
                                                document.getElementById('tripPassengerForm').submit();">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection


                    <script src={{ asset( "js/vendor/jquery-2.2.4.min.js") }}></script>
                    <script>
                        $(document).ready(function() {
        $("#openModal").on("click", function () {
            let trip_no = $(this).data('id');
            console.log(trip_no);
            $(".modal-body #trip_no").val( trip_no );
        });
    });

                    </script>