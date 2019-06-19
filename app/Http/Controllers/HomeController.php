<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Booking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schedules = Schedule::all();
        return view('index', compact('schedules'));
    }

    public function home()
    {
        redirect('/');
    }
    
    public function user(){
        $userid = auth()->id();
        $userbookings = Booking::where('user', $userid)->get();
        $count = $userbookings->count();

        $seats = array();
        foreach ($userbookings as $booking) {
            array_push($seats, $booking->seat);
        }
        // dd(Booking::where('user', 1)->get()->mapWithKeys(function($key, $item) {return [$item];}));
        // $userbookings

        // dd($userbookings);

        return view('pages.home', compact('userbookings', 'count', 'seats'));
    }
}
