<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Seat;
use App\Booking;

class ClearSeats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user_id;
    private $schedule_id;
    private $pick_point;
    private $seats;

    public function __construct($user_id, $schedule_id, $pick_point, $seats)
    {
        $this->user_id = $user_id;
        $this->schedule_id = $schedule_id;
        $this->pick_point = $pick_point;
        $this->seats = $seats;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Booking::where([
            ['user', $this->user_id],
            ['schedule', $this->schedule_id],
            ['pick_point', $this->pick_point],
            ['confirmed', false]
        ])->delete();

        Seat::whereIn('id', $this->seats)->update(['available' => true]);
    }
}
