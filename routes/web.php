<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/signup', function() {
            return view('Pages/auth/signup');
        })->name('auth.signup');
        
        Route::post('/signup', 'AuthController@create');

        /**
         * Login Routes
         */
        Route::get('/login', function () {
            return view('Pages/auth/login');
        })->name('auth.login');
        Route::post('/login', 'AuthController@login');
    });
});