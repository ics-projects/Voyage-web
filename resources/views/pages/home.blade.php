@extends('layouts.layout')
<header id="header">
    @include('includes.header')
</header>


@section('content')
<div class="section-gap">
    <div class="container">
        <div class="col-lg-4 col-md-6">

            <div class="tab-content" id="bookingForm">
                <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                    <form class="form-wrap">
                        <div class="row align-items-center">
                            <li class="nav-item">
                                <p>Book Your Bus</p>
                            </li>
                        </div>
                        <select class="form-control" id="departure" name="departure" placeholder="where from "
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'from '">
                            @foreach ($trips as $trip)
                            <option value="{{ $trip->schedule->origin->id }}">{{ $trip->schedule->origin->name }}
                            </option>
                            @endforeach
                        </select>
                        <select class="form-control" id="destination" name="destination" placeholder="where to "
                            onfocus="this.placeholder = ''" onblur="this.placeholder = ' To '">
                            @foreach ($trips as $trip)
                            <option value="{{ $trip->schedule->destination->id }}">{{ $trip->schedule->destination->name }}
                            </option>
                            @endforeach
                        </select>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Date "
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date '">
                        <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults "
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
                        <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child "
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">
                        <a href="#" id="search" class="primary-btn text-uppercase">Search Buses</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src={{ asset( "js/vendor/jquery-2.2.4.min.js") }}></script>
<script>
    $(document).ready(function() {
        $('#search').on('click', function () {
            let departure = $('#departure').val();
            let destination = $('#destination').val();
            let date = $('#date').val();

            window.location.replace(`/trip/?departure=${departure}&destination=${destination}&date=${date}`);
        });
    });

</script>