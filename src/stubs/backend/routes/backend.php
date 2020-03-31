<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend - Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "backend" middleware group. Now create something great!
|
*/

// Dashboard
Route::get('/', function () {
    return view('backend.dashboard');
})->name('dashboard');

// Logout
Route::post('/logout','Auth\LoginController@logout')->name('logout');
