@extends('layouts.layout')
<header id="header">
    @include('includes.header')
</header>

@section('content')
<div class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="bookingForm" method="POST" action="/booking">
                            @csrf
                            <input id="trip_id" name="trip_id" type="text" style="display: none;"
                                value="{{ $trip->id }}">
                            {{-- <select id="selected-seats" name="seats[]" multiple="multiple"
                                ></select> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Pick Point</label>
                                        <select class="form-control" id="pick-point" name="pick-point">
                                            @foreach ($stages as $stage)
                                            <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="">Drop Point</label>
                                        <select class="form-control" id="drop-point" name="drop-point">
                                            <option value="{{ $trip->schedule->destination->id }}">
                                                {{ $trip->schedule->destination->name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button id="submitBtn" type="submit" class="btn btn-primary pull-right">Save</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="seat-map">
                    <div class="front-indicator">
                        <h3>Front</h3>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="col-md-3">
                <div class="booking-details">
                    <div id="legend"></div>
                    <h3> Selected Seats (<span id="counter">0</span>):</h3>
                    <ul id="selected-seats" class="scrollbar scrollbar1"></ul>

                    Total: <b>$<span id="total">0</span></b>

                    {{-- <button class="checkout-button">Pay Now</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src={{ asset("js/pick-seat.js") }}></script>
@endsection