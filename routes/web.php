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


Route::middleware(['web'])
        ->prefix('owner')
        ->group(function () {

     Route::post('login', 'Owner\LoginController@login');

    //  Route::get('login', function(){
    //    return response()->json(['_token' => csrf_token()]);
    // });

    Route::middleware(['auth', 'owner'])->group(function () {
        Route::get('dashboard', function () {
            return 'Halaman Dashboard Owner';
        })->name('owner.dashboard');
    });
});
