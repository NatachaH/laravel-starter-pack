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

// Users
Route::any('/users/trashed', 'UserController@trashed')->name('users.trashed');
Route::patch('/users/{id}/restore', 'UserController@restore')->name('users.restore');
Route::delete('/users/{id}/forceDelete', 'UserController@forceDelete')->name('users.forceDelete');
Route::resource('users','UserController');

// Account
Route::get('/account/edit', 'UserController@editAccount')->name('account.edit');
Route::patch('/account/edit', 'UserController@updateAccount')->name('account.update');

// Roles
Route::resource('roles','\Nh\StarterPack\Http\Controllers\Backend\RoleController');

// Permissions
Route::resource('permissions','\Nh\StarterPack\Http\Controllers\Backend\PermissionController');
