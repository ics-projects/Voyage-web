@extends('layouts.layout')

@section('content')
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Payment
        </h1>
        <p class="text-white link-nav"><a href="#">Home</a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> About Us</a></p>
      </div>
    </div>
  </div>
</section>

<div class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card bg-light">
                    <div class="card-body mx-auto" style"max-width:600px">
                        <h5 class="card-title">Payment</h5>
                        <form action="/mpesa/pay" method="post">
                            @csrf
                            <input id="amount" name="amount" type="text" style="display: none;" value="{{ $total_price }}">
                            <div class="row">
                                <div class="col-md-5">
                                    Mpesa Payment
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        You will receive a prompt from Mpesa on the mobile phone below
                                    </p>
                                    <p>
                                      <div class="form-group input-group" style="max-width:250">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                      </div>
                                      <select name="countrycode"  class="custom-select" style="max-width: 120px;">
                                          <option selected="" value="254">Kenya +254</option>
                                          <option value="255">Tanzania +255</option>
                                          <option value="256">Uganda +256</option>
                                      </select>
                                        <input name="mobile-no" class="form-control" placeholder="Phone number" type="number">
                                      </div>
                                    </p>
                                </div>
                            </div>
                            <button id="submitBtn" type="submit" class="btn-log">Save</button>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
              <strong>Booking Details</strong>
                <p>Boarding point: {{ $stages[0]->name }}</p>
                <p>Drop Point: {{ $stages[1]->name }}</p>
                <p>Departure time: {{ $departure_time }}</p>
                <p>Total price: {{ $total_price }}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
