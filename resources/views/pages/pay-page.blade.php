@extends('layouts.layout')

@section('content')
<div class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Options</h5>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    Mpesa Payment
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        You will receive a prompt from Mpesa on the mobile phone below
                                    </p>
                                    <p>
                                        <div class="form-group">
                                            <label class="">Mobile Phone</label>
                                            <input type="number" name="mobile-no">
                                        </div>
                                    </p>
                                </div>
                            </div>
                            <button id="submitBtn" type="submit" class="btn btn-primary pull-right">Save</button>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <p>Boarding point: {{ $stages[0]->name }}</p>
                <p>Drop Point: {{ $stages[1]->name }}</p>
                <p>Departure time: {{ $departure_time }}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection