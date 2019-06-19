<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

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

  public function user()
  {
    return view('pages.home');
  }

  public function about()
  {
    return view('pages.about');
  }

  public function contact()
  {
    return view('pages.contact');
  }
}
