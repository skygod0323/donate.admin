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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/users', 'UsersController@index')->name('users');
Route::get('/donations', 'DonationController@index')->name('donations');
Route::get('/donor_wall', 'DonorWallController@index')->name('donor_wall');
Route::post('/donor_wall/upload', 'DonorWallController@upload')->name('donor_wall_upload');
