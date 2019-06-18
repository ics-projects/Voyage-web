@extends('layouts.layout')

@section('content')
<div class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="bookingForm" method="POST" action="/bookingPhase/pickseat">
                            @csrf
                            <input id="trip_id" name="trip_id" type="text" style="display: none;"
                                value="{{ $trip->id }}">
                            <select id="form-seats" name="seats[]" multiple="multiple" style="display: none;"></select>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class=""><h6>PICK UP POINT</h6></label>
                                        <select class="form-control" id="pick-point" name="pick-point">
                                            @foreach ($stages as $stage)
                                            <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class=""><h6>DROP POINT</h6></label>
                                        <select class="form-control" id="drop-point" name="drop-point">
                                            <option value="{{ $trip->scheduleID->destinations->id }}">
                                                {{ $trip->scheduleID->destinations->name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button id="submitBtn" type="submit" class="btn-log" style="width: 100%;">Proceed to Payment</button>
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
                    <br><br>
                    <h4> Selected Seats (<span id="counter">0</span>):</h4>
                    <ul id="selected-seats" class="scrollbar scrollbar1"></ul>
                    <br>
                    <br>
                    <hr>
                    <h3>Total: <b>KSHs<span id="total">0</span></b></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


@parent
<script src={{ asset("js/jquery.seat-charts.js") }} defer></script>
<script src={{ asset("js/pick-seat.js") }} defer></script>
@endsection