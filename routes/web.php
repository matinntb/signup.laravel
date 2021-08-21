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

Route::get('/home',function (){
    return view('home.home');
});
Route::get('/home2',function (){
    return view('home2.home2');
});
Route::resource('/get_user','GetUserController');
Route::resource('/user','FormController');
