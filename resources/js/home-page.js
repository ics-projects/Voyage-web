$(document).ready(function () {
    $('#search').on('click', function () {
        let departure = $('#departure').val();
        let destination = $('#destination').val();
        let date = $('#date').val();

        window.location.replace(`/trip/?departure=${departure}&destination=${destination}&date=${date}`);
    });
});