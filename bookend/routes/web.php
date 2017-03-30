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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/rooms', function () {

	$rooms = DB::table('room')->get();

    return view('rooms', ['rooms' => $rooms]);
}); 
*/
use App\Room;

Auth::routes();

Route::get('/rooms/edit_room/{room}', 'RoomController@index2');
Route::get('rooms/{room}/edit', 'RoomController@edit');
Route::PUT('/rooms/{room}', 'RoomController@update')->name('update');
Route::delete('/rooms/{room}', 'RoomController@destroy')->name('delete');
/* Route::get('/layouts/sidebar', 'SidebarController@create')->name('create'); */

Route::get('/bookingV', 'BookingController@index');
Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/rooms', 'RoomController@index');
Route::get('/rooms/{room}', 'RoomController@show')->name('room_profile');
Route::get('/newroom', 'RoomController@create');
Route::get('/editroom', 'RoomController@editroom');

Route::get('/newroom', 'SidebarController@create');

//Route::post('/newroom', 'RoomController@store');

Route::patch('/rooms/{room}/', 'RoomController@update');