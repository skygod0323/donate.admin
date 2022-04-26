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
Route::post('/donation/payment_intent', 'DonationController@payment_intent')->name('payment_intent');
Route::post('/donation/confirm_payment_intent', 'DonationController@confirm_payment_intent')->name('confirm_payment_intent');
Route::post('/donation/subscribe_donation', 'DonationController@subscribe_donation')->name('subscribe_donation');
Route::get('/donation/cryptoDonation', 'DonationController@cryptoDonation')->name('crypto_donation');
Route::get('/donation/summary', 'DonationController@summary')->name('donation_summary');
Route::get('/donor_wall/donor_wall', 'DonorWallController@donor_wall')->name('donor_wall_get');





