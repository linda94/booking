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

Route::get('/bookingV', 'BookingController@index');
Route::get('/', 'WelcomeController@index');
Route::get('/rooms', 'RoomController@index');
Route::get('/rooms/{room}', 'RoomController@show')->name('room_profile');
Route::get('/newroom', 'RoomController@create');
Route::get('/editroom', 'RoomController@editroom');

Route::get('/newroom', 'SidebarController@create');

Route::get('/logout', function() {
	Auth::logout();
	return redirect('/');
	})->name('logout');
	
Route::get('/users/home', 'HomeController@index');
Route::get('/users/home_edit', 'HomeController@index2');
Route::get('/users/{users}', 'HomeController@show')->name('users_profile');
Route::get('/user_list', 'UserListController@index'); // Til Userlist siden
Route::PUT('/users/{users}', 'HomeController@update')->name('update_user');
Route::delete('/users/{users}', 'HomeController@destroy')->name('delete_user');

//Route::post('/newroom', 'RoomController@store');

Route::patch('/rooms/{room}/', 'RoomController@update');