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
        $userid = session('id');
        $userbookings = Booking::where('user', $userid)->get();
        return view('pages.home', compact('userbookings'));
    }
}
