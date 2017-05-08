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
use App\User;
use App\Role;

Auth::routes();

Route::get('/rooms/edit_room/{room}', 'RoomController@index2')->name('editroom_redirect');
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

Route::get('/invite_user', 'InviteUserController@index')->name('invite_user_index');
Route::post('/emails/send', 'InviteUserController@send')->name('invite_mail'); 

Route::get('/logout', 'UserController@logout')->name('logout');
	
Route::get('/users/home', 'HomeController@index')->name('users_return');
Route::get('/users/home_edit', 'HomeController@index2');
Route::get('/users/{users}', 'HomeController@show')->name('users_profile');

Route::PUT('/users/{users}', 'HomeController@update')->name('update_user');
Route::delete('/users/{users}', 'HomeController@destroy')->name('delete_user');

Route::patch('/rooms/{room}/', 'RoomController@update');

Route::get('/room_list', 'RoomListController@index');

Route::get('/user_list', 'UserListController@index'); 
Route::get('/users/user_home_edit', 'UserListController@index2');
Route::get('/user_list/{users}', 'UserListController@show');
//Route::PUT('/user_list/{users}', 'UserListController@update')->name('update_user');
//Route::delete('/user_list/{users}', 'UserListController@destroy')->name('delete_user');

