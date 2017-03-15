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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/rooms', 'RoomController@index');
Route::get('/rooms/{room}', 'RoomController@show');
Route::get('/newroom', 'RoomController@create');
Route::get('/editroom', 'RoomController@editroom');

Route::post('/newroom', 'RoomController@store');
