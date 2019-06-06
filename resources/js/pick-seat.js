(function () {
    let url = window.location.pathname;
    let id = url.substring(url.lastIndexOf('/') + 1);

    $.ajax({
        method: 'GET',
        url: `/trip/${id}`,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            createSeatChart(response.seats);
        }
    });

})();

function createSeatChart(seatData) {
    let firstSeatLabel = 1;
    let seatOffset = seatData[0].id - 1;
    let map = [
        'f___f',
        'f___f',
        'ee_ee',
        'ee_ee',
        'ee_ee',
        'ee_ee',
        'ee_ee',
        'ee_ee',
        'ee_ee',
        'ee_ee',
        'ee_ee'
    ];
    $(document).ready(function () {
        let $seats = $('#form-seats');
        let $cart = $('#details'),
            $counter = $('#counter'),
            $total = $('#total'),
            sc = $('#seat-map').seatCharts({
                map: map,
                seats: {
                    f: {
                        price: 100,
                        classes: 'first-class', //your custom CSS class
                        category: 'First Class'
                    },
                    e: {
                        price: 40,
                        classes: 'economy-class', //your custom CSS class
                        category: 'Economy Class'
                    }
                },
                naming: {
                    top: false,
                    getLabel: function (character, row, column) {
                        return firstSeatLabel++;
                    },
                    getId: function (character, row, column) {
                        return firstSeatLabel;
                    }

                },
                legend: {
                    node: $('#legend'),
                    items: [
                        ['f', 'available', 'First Class'],
                        ['e', 'available', 'Economy Class'],
                        ['f', 'unavailable', 'Already Booked']
                    ]
                },
                click: function () {
                    if (this.status() == 'available') {
                        //let's create a new <li> which we'll add to the cart items
                        $('<li>' + this.data().category + ' : Seat no ' + this.settings.label + ': <b>$' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                            .attr('id', 'cart-item-' + this.settings.id)
                            .data('seatId', this.settings.id)
                            .appendTo($cart);

                        // create option element and append it to select element inside the form
                        createOptionElement($seats, this.settings.label, this.settings.id);

                        $counter.text(sc.find('selected').length + 1);
                        $total.text(recalculateTotal(sc) + this.data().price);
                        return 'selected';
                    } else if (this.status() == 'selected') {
                        //update the counter
                        $counter.text(sc.find('selected').length - 1);
                        //and total
                        $total.text(recalculateTotal(sc) - this.data().price);
                        //remove the item from our cart
                        $('#cart-item-' + this.settings.id).remove();
                        // remove item from form
                        $('#form-item-' + this.settings.id).remove();
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
        //this will handle "[cancel]" link clicks
        $('#selected-seats').on('click', '.cancel-cart-item', function () {
            //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
            sc.get($(this).parents('li:first').data('seatId')).click();
        });
        //let's pretend some seats have already been booked
        // sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');

        setUnavailableSeats(sc);
    });

    function setUnavailableSeats(sc) {
        $.each(seatData, function (index, seat) {
            if (seat.available === 0) {
                sc.get((seat.id - seatOffset).toString()).status('unavailable');
            }
        });
    }

    function createOptionElement($seats, label, id) {
        let value = label + seatOffset;
        $(`<option selected="selected">${label}</option>`)
            .attr('id', 'form-item-' + id)
            .val(value)
            .appendTo($seats);
    }

    function recalculateTotal(sc) {
        let total = 0;
        //basically find every selected seat and sum its price
        sc.find('selected').each(function () {
            total += this.data().price;
        });
        return total;
    }
}
