<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use App\Room;
use App\Role;
use EntrustUserTrait;

class UserListController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room)
    {
		$Users = User::all();
        $rooms = DB::table('room')->get();

        return view('user_list', compact('Users', 'room', 'rooms'));
    }

    
    public function index2(User $users)
    {   
        $rooms = DB::table('room')->get();
        $users = DB::table('users')->get();
        
        return view('/users/user_home_edit', compact('room', 'rooms', 'user', 'users'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->find($id);
        $rooms = DB::table('room')->get();

        return view('users.user_home', compact('user','rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function edit($id)
    {
        $user = DB::table('users')->find($id);

        $rooms = DB::table('room')->get();
        $users = DB::table('users')->get();
		$role_user = DB::table('role_user')->get();

        return view('users/user_home_edit', compact('user','rooms', 'users', 'role_user'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = DB::table('users')->find($id);
        
        $Users_name = $request->users_name;
        $Users_phone = $request->users_phone;
        $Users_company = $request->users_company;
		$Users_description = $request->users_description;
        
        DB::table('users')
            ->where('id', $id)
            ->update(array('name' => $Users_name, 'phone' => $Users_phone, 'company' => $Users_company,
			'description' => $Users_description));
            
        return redirect()->route('users_profiles', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('user_list');
    }
	
	public function bruker($id, User $users)
	{
		$bruker = DB::table('roles')
		->where('name', 'bruker')->get()->first();
		
		DB::table('role_user')
		->where('user_id', $id)
		->delete();
		
		$users = User::find($id);
		$users->attachRole(3);
		
		$success = "Brukernivået har blitt endret";
		
		return redirect()->route('user_home_edit_redirect', ['id' => $id])->with(compact('success'));
	}
	public function superBruker($id, User $users)
	{
		$superBruker = DB::table('roles')
		->where('name', 'superBruker')->get()->first();
		
		DB::table('role_user')
		->where('user_id', $id)
		->delete();
		
		$users = User::find($id);
		$users->attachRole(2);
		
        $success = "Brukernivået har blitt endret"; 

		return redirect()->route('user_home_edit_redirect', ['id' => $id])->with(compact('success'));
	}
	public function administrator($id, User $users)
	{
		$administrator = DB::table('roles')
		->where('name', 'administrator')->get()->first();
		
		DB::table('role_user')
		->where('user_id', $id)
		->delete();
		
		$users = User::find($id);
		$users->attachRole(1);
		
        $success = "Brukernivået har blitt endret";

		return redirect()->route('user_home_edit_redirect', ['id' => $id])->with(compact('success'));
	}
}
