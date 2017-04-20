<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room, User $users, Request $request)
    {
		$users = DB::table('users');
		
		$users -> name = $request->name;
        $users -> email = $request->email;
        $users -> phone = $request->phone;
		$users -> company = $request->company;
		
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
        
		return view('/users/home', compact('room', 'rooms', 'user', 'users'));
    }
	
	    public function index2(Room $room, User $users, Request $request)
    {
		$users = DB::table('users');
		
		$users -> name = $request->name;
        $users -> email = $request->email;
        $users -> phone = $request->phone;
		$users -> company = $request->company;
		
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
        
		return view('/users/home_edit', compact('room', 'rooms', 'user', 'users'));
    }
	
	    public function update(Request $request, $id)
    {
		$users = DB::table('users')->find($id);
		
		$Users_name = $request->users_name;
        $Users_email = $request->users_email;
        $Users_phone = $request->users_phone;
		$Users_company = $request->users_company;
		
		DB::table('users')
			->where('id', $id)
			->update(array('name' => $Users_name, 'email' => $Users_email, 'phone' => $Users_phone, 'company' => $Users_company));
			
		return redirect()->route('users_profile', ['id' => $id]);
    }
	
	public function show(Room $room, User $users, Request $request)
    {
		$users = DB::table('users');
		
		$users -> name = $request->name;
        $users -> email = $request->email;
        $users -> phone = $request->phone;
		$users -> company = $request->company;
		
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
        
		return view('/users/home_edit', compact('room', 'rooms', 'user', 'users'));
	}
	
	public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
		return redirect('/');
    }
}
