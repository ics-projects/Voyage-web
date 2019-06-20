<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Booking;

class CustomerBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $bookings;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookings)
    {
        $this->bookings = $bookings;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.customer-booking', [$this->bookings]);
    }
}
