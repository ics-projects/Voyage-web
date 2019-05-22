@extends('layouts.layout')

@section('content')
<div class="section-gap">
    <div class="container">
        <div class="booking-details">
            <div id="legend"></div>
            <h3> Selected Seats (<span id="counter">0</span>):</h3>
            <ul id="selected-seats" class="scrollbar scrollbar1"></ul>

            Total: <b>$<span id="total">0</span></b>

            <button class="checkout-button">Pay Now</button>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
@endsection