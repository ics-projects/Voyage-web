$(document).ready(function() {
    $('#search').on('click', function(event) {
        event.preventDefault();

        let departure = $('#departure').val();
        let destination = $('#destination').val();
        let date_val = $('#date').val();

        let departure_val = $('#departures [value="' + departure + '"]').data('value');
        let destination_val = $('#destinations [value="' + destination + '"]').data('value');

        window.location
            .replace(`/trip/?departure=${departure_val}&destination=${destination_val}&
            date=${date_val}`);
    });

    $('#nav-tabs a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show active')
    });
});