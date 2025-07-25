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

    // login 
     Route::post('login', 'Owner\LoginController@login')->name('login');

    //  login csrf token
     Route::get('login', function(){
       return response()->json(['_token' => csrf_token()]);
    });

    Route::middleware(['auth', 'owner'])->group(function () {
        
        // dashboard
        Route::get('dashboard', function () {
            return 'Halaman Dashboard Owner';
        })->name('owner.dashboard');

        // Register
        Route::prefix('register')->group(function () {
            
            // app
            Route::resource('clientApp', 'Owner\Registers\AppClientController');

            // modul

            // menu

            // role group

            // role

            // application user fall back
              Route::resource('applicationUser', 'Owner\Registers\ApplicationUserController');

            
        });
      
    });
});
