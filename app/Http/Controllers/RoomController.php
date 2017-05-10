<?php

namespace App\Http\Controllers;

use DB;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
        //return $rooms;
        return view('rooms', compact('rooms', 'users'));
    }
	/**
	* public function __construct() 
	* {
	* 	$this->middleware('role:Administrator');
	* }
	*/
	public function index2(Room $room)
    {
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
		return view('/rooms/edit_room', compact('room', 'rooms', 'users'));
	}
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newroom');
    }

    /**
     * Show the form for editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
        //public function editroom()
    //{
		//return view('editroom');
    //}

    /**
     * Store a new room in the database. This method is used primarilly as a test method for creating rooms.
     * The proper method for creating rooms is located in SidebarController@Create
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new Room;

        $room -> name = $request->name;
        $room -> capacity = $request->capacity;
        $room -> equipment = $request->equipment;

        $room->save();

        Return redirect('/rooms');
    }

    /**
     * Display the required room. Takes a wildcard and creates a url based on the wildcard/room object (primary key from the DB table in question)
     * Uses Route model binding.
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room) //Room::find(wildcard);
    {   
	
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
		
        //$room = Room::find($id);

        //return $room;

        return view('rooms.show', compact('room', 'rooms', 'users', 'newroom'));
    }

    /**
     * Edit the curent room. Based of wildcard $id that corresponds with current room.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */

    
    public function edit($id)
    {
        $room = DB::table('room')->find($id);
		
		return view('rooms/edit_room', compact('room'));
    }

    /**
     * Stores edited room information in the databse.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$room = DB::table('room')->find($id);
		
		$Room_name = $request->room_name;
        $Room_capacity = $request->room_space;
        $Room_Equipment = $request->room_equipment;

        $success = $Room_name . " lagret";
		
		DB::table('room')
			->where('id', $id)
			->update(array('name' => $Room_name, 'capacity' => $Room_capacity, 'equipment' => $Room_Equipment));
			
		return redirect()->route('room_profile', ['id' => $id])->with(compact('success'));
    }

    /**
     * Delete a room completely from the database.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomDel = DB::table('room')->find($id);
        $success = $roomDel->name . " slettet";

        DB::table('room')->where('id', $id)->delete();
		return redirect('/bookingV')->with(compact('success'));
    }
}
