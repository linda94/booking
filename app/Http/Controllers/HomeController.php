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
		$users -> description = $request->description;
		
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
		$users -> description = $request->description;
		
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
        
		return view('/users/home_edit', compact('room', 'rooms', 'user', 'users'));
    }
	
	    public function update(Request $request, $id)
    {
		$users = DB::table('users')->find($id);
		
		$Users_name = $request->users_name;
        $Users_phone = $request->users_phone;
		$Users_company = $request->users_company;
		$Users_description = $request->users_description;
		
		DB::table('users')
			->where('id', $id)
			->update(array('name' => $Users_name, 'phone' => $Users_phone,
			'company' => $Users_company, 'description' => $Users_description));
			
		return redirect()->route('users_return', ['id' => $id]);
    }
	
	public function show(Room $room, User $users, Request $request)
    {
		$users = DB::table('users');
		
		$users -> name = $request->name;
        $users -> email = $request->email;
        $users -> phone = $request->phone;
		$users -> company = $request->company;
		$users -> description = $request->description;
		
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
