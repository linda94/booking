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

Auth::routes();

<<<<<<< HEAD
Route::get('/bookingV', 'BookingController@index')

=======
Route::get('/bookingV', 'BookingController@index');
>>>>>>> bdd4f14329373f0148fcafec131d3c807ca80c12
Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/rooms', 'RoomController@index');
Route::get('/rooms/{room}', 'RoomController@show');
Route::get('/newroom', 'RoomController@create');
Route::get('/editroom', 'RoomController@editroom');

Route::post('/newroom', 'RoomController@store');

Route::patch('/rooms{room}/', 'RoomController@update');