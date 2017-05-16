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
//Route::get('rooms/{room}/edit', 'RoomController@edit');
Route::get('/auth/passwords/email', function () {
	Auth::logout();
	Session::flush();
	return view('/auth/passwords/email');
});
/*  -- Ikke lagt inn --
Route::get('/auth/passwords/reset', function () {
	$success = "Passordet har blitt endret";
	return view('/')->with(compact('success'));
});
*/

Route::get('/rooms/edit_room/{room}', 'RoomController@index2')->name('editroom_redirect');
Route::get('rooms/{room}/edit', 'RoomController@edit');
Route::PUT('/rooms/{room}', 'RoomController@update')->name('update');
Route::delete('/rooms/{room}', 'RoomController@destroy')->name('delete');

// BookingController
Route::get('/bookingV', 'BookingController@index');
Route::post('/bookingV', 'BookingController@store');
Route::DELETE('/bookingV/{booking}', 'BookingController@destroy')->name('delete_booking'); //Fikk ikke slettet rom når denne var samme som roomControllers name('delete')
Route::get('/bookingV/{booking}', 'BookingController@show')->name('show_booking');
Route::PUT('/bookingV/{booking}', 'BookingController@update');

Route::get('/', 'WelcomeController@index');
Route::get('/auth/login', 'WelcomeController@loginIndex');

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

Route::PUT('/users/home/{users}', 'HomeController@update')->name('update_user');
Route::delete('/users/home/{users}', 'HomeController@destroy')->name('delete_user');

Route::patch('/rooms/{room}/', 'RoomController@update');

Route::get('/room_list', 'RoomListController@index');

Route::get('/user_list', 'UserListController@index'); // nr 1 
Route::get('/user_list/{users}', 'UserListController@show')->name('users_profiles'); // nr 2
Route::get('/users/user_home_edit/{users}','UserListController@index2'); // nr 3
Route::get('users/{user}/user_home_edit', 'UserListController@edit')->name('user_home_edit_redirect'); // nr 4
Route::PUT('/users/{users}','UserListController@update')->name('user_list_update'); // nr 5
Route::delete('/users/{users}', 'UserListController@destroy')->name('user_list_delete'); // nr 6

// Brukernivå assigning
Route::get('/users/{user}/user_home_edit/assign_bruker','UserListController@bruker');
Route::get('/users/{user}/user_home_edit/assign_superbruker','UserListController@superBruker');
Route::get('/users/{user}/user_home_edit/assign_administrator','UserListController@administrator');




