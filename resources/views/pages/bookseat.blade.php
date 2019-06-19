@('layouts.layout')

@section('context')
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Book your Seat
                    </h1>
                    <p class="text-white link-nav"> Do you have an account?<span class="lnr lnr-arrow-right"></span> <a href="#">Create Account</a></p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-gap">
        <div class="container">
            <div class="main">
                <h2>Book Your Seat Now?</h2>
                <div class="wrapper">
                    <div id="seat-map">
                        <div class="front-indicator">Front</div>
                    </div>
                    <div class="booking-details">
                        <div id="legend"></div>
                        <h2>Booking Details</h2>
                        <h3> Selected Seats (<span id="counter">0</span>):</h3>
                        <ul id="selected-seats" class="scrollbar scrollbar1">
                        </ul>
                        Total: <b>Ksh<span id="total">0</span></b>
                        <button class="checkout-button">Checkout</button>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var firstSeatLabel = 1;

        $(document).ready(function() {
            var $cart = $('#selected-seats'),
                $counter = $('#counter'),
                $total = $('#total'),
                sc = $('#seat-map').seatCharts({
                    map: [
                        'ff_ff',
                        'ff_ff',
                        'ee_ee',
                        'ee_ee',
                        'ee___',
                        'ee_ee',
                        'ee_ee',
                        'ee_ee',
                        'eeeee',
                    ],
                    seats: {
                        f: {
                            price: 1500,
                            classes: 'first-class', //your custom CSS class
                            category: 'First Class'
                        },
                        e: {
                            price: 800,
                            classes: 'economy-class', //your custom CSS class
                            category: 'Economy Class'
                        }

                    },
                    naming: {
                        top: false,
                        getLabel: function(character, row, column) {
                            return firstSeatLabel++;
                        },
                    },
                    legend: {
                        node: $('#legend'),
                        items: [
                            ['f', 'available', 'First Class'],
                            ['e', 'available', 'Economy Class'],
                            ['f', 'unavailable', 'Already Booked']
                        ]
                    },
                    click: function() {
                        if (this.status() == 'available') {
                            //a new <li> which we'll add to the cart items
                            $('<li>' + this.data().category + ' : Seat no ' + this.settings.label + ': <b>Ksh' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                .attr('id', 'cart-item-' + this.settings.id)
                                .data('seatId', this.settings.id)
                                .appendTo($cart);

                            $counter.text(sc.find('selected').length + 1);
                            $total.text(recalculateTotal(sc) + this.data().price);

                            return 'selected';
                        } else if (this.status() == 'selected') {
                            //update the counter
                            $counter.text(sc.find('selected').length - 1);
                            //and total
                            $total.text(recalculateTotal(sc) - this.data().price);

                            //remove the item from cart
                            $('#cart-item-' + this.settings.id).remove();

                            //seat has been vacated
                            return 'available';
                        } else if (this.status() == 'unavailable') {
                            //seat has been already booked
                            return 'unavailable';
                        } else {
                            return this.style();
                        }
                    }
                });
            $('#selected-seats').on('click', '.cancel-cart-item', function() {
                sc.get($(this).parents('li:first').data('seatId')).click();
            });
        });

        function recalculateTotal(sc) {
            var total = 0;

            sc.find('selected').each(function() {
                total += this.data().price;
            });

            return total;
        }
    </script>
    @endsection
