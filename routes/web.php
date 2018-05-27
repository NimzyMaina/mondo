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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('t', function () {
    return view('test');
});

Route::group(['prefix' => 'drivers'], function () {
    //Show On-boarding form
    Route::get('on-board', 'DriversController@showOnBoard')->name('drivers.show-board');
});
