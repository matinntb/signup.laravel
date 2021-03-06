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

Route::resource('/user','FormController');
Route::prefix('password')->group(function () {
    Route::get('{id}/edit','FormController@showEditForm');
    Route::post('{id}','FormController@changePassword');
});

Route::get('university', 'FormController@university');
Route::get('polymorph', 'FormController@polymorph');
