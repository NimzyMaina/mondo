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
    // Show all drivers
    Route::get('view', 'DriversController@index')->name('drivers.index');
    // Datatables driver data
    Route::get('data', 'DriversController@getDrivers')->name('drivers.data');
    //Show On-boarding form
    Route::get('on-board', 'DriversController@showOnBoard')->name('drivers.create');
    // Store driver
    Route::post('on-board', 'DriversController@storeDriver')->name('drivers.store');
    //Edit driver
    Route::get('edit/{id}', 'DriversController@editDriver')->name('drivers.edit');
    // Update driver
    Route::put('edit/{id}', 'DriversController@updateDriver')->name('drivers.update');
});
