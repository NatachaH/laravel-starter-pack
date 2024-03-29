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
Route::get('/', 'DashboardController')->name('dashboard');

// Activity Log
Route::any('/activity-log/search', '\Nh\StarterPack\Http\Controllers\Backend\ActivityLogController@search')->name('activity-log.search');
Route::get('/activity-log/{track}', '\Nh\StarterPack\Http\Controllers\Backend\ActivityLogController@show')->name('activity-log.show');
Route::delete('/activity-log/{track}/delete', '\Nh\StarterPack\Http\Controllers\Backend\ActivityLogController@destroy')->name('activity-log.destroy');
Route::get('/activity-log', '\Nh\StarterPack\Http\Controllers\Backend\ActivityLogController@index')->name('activity-log.index');

// Account
Route::get('/account/edit', '\Nh\StarterPack\Http\Controllers\Backend\UserController@editAccount')->name('account.edit');
Route::patch('/account/edit', '\Nh\StarterPack\Http\Controllers\Backend\UserController@updateAccount')->name('account.update');

// Users
Route::any('/users/search', '\Nh\StarterPack\Http\Controllers\Backend\UserController@search')->name('users.search');
Route::any('/users/trashed', '\Nh\StarterPack\Http\Controllers\Backend\UserController@trashed')->name('users.trashed');
Route::patch('/users/{user}/restore', '\Nh\StarterPack\Http\Controllers\Backend\UserController@restore')->name('users.restore');
Route::delete('/users/{user}/forceDelete', '\Nh\StarterPack\Http\Controllers\Backend\UserController@forceDelete')->name('users.forceDelete');
Route::resource('users', '\Nh\StarterPack\Http\Controllers\Backend\UserController');

// Roles
Route::any('/roles/search', '\Nh\StarterPack\Http\Controllers\Backend\RoleController@search')->name('roles.search');
Route::resource('roles', '\Nh\StarterPack\Http\Controllers\Backend\RoleController');
