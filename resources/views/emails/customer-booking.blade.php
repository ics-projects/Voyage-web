@component('mail::message')
# Voyage web

Your bookings
@component('mail::panel')
@component('mail::table')
| User          | Origin        | Destination  | Seat  |
| ------------- |:-------------:| ------------:| -----:|
@foreach ($bookings as $booking)
| {{$booking->users->first_name}}      | {{$booking->pick_points->name}}      | {{$booking->schedules->destinations->name}}      | {{$booking->seat}} |
@endforeach
@endcomponent
@endcomponent

@component('mail::button', ['url' => 'https://voyageweb.tk/user'])
View Booking
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
