<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Seat;

class ClearSeats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $seat_ids;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($seat_ids)
    {
        $this->seat_ids = $seat_ids;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $seats = $this->seat_ids;
        // dd($seats);
        foreach ($seats as $seat) {
            Seat::where('id', $seat)->update(['available' => true]);
        }
    }
}
