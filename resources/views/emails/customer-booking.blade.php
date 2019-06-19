@component('mail::message')
# Voyage web

Your bookings
@component('mail::panel')
@foreach ($bookings as $booking)
    {{$booking->user}}
@endforeach
@endcomponent

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
