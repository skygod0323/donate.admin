<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->post('/donate', function (Request $request) {
    
// });

Route::post('/donation/create', 'DonationController@create')->name('create_donation');
Route::get('/donation/cryptoDonation', 'DonationController@cryptoDonation')->name('crypto_donation');
Route::get('/donation/summary', 'DonationController@summary')->name('donation_summary');




