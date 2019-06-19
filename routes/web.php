<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'HomeController@user')->name('account');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

Auth::routes();

Route::resource('/trip', 'TripController');
Route::resource('/booking', 'BookingController');

Route::post('/bookingPhase/pickseat', 'BookingPhasesController@pickSeat');
Route::get('/bookingPhase/pay', 'BookingPhasesController@pay')->name('pay');
Route::post('/mpesa/pay', 'MpesaController@pay');
// Route::post('/mpesa/stkpushcallback', 'MpesaController@stkPushCallback');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
