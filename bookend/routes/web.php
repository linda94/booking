<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which| contains the "web" middleware group. Now create something great!
|
*/
use App\user;

Route::get('/', function () {

   $users = DB::table('user')->get();

   return view('welcome', compact('users'));

});

Route::get('/post', function () {

    return view('post');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', 'RegisterController@create');

Route::post('/post', function (Request $request) {
        //dd(request()->all());
        //Create new data
        $user = new user;
        $user->UserID =  request('userid');
        $user->FirstName = request('fName');
        $user->LastName = request('lName');
        $user->Company = request('company');
        $user->Phone = request('phone');
        $user->Email = request('email');
        $user->Passwordd = request('password');
        $user->Description = request('desc');
        $user->AccessLevel = request('access');      
        //Save to database
        $user->save();
        //Redirect back to previous page / where ever...
        return redirect('/');
});

//Route::post('/post', 'PostController@store');
//Route::post('/post', 'userController@store');
//Route::post('/post', 'userController@create');
Auth::routes();

Route::get('/home', 'HomeController@index');
