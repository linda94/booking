<?php

namespace App\Http\Controllers;

use DB;
use App\Room;
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
	
	public function index2(Room $room){
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
        public function editroom()
    {
		return view('editroom');
    }

    /**
     * Store a newly created resource in storage.
     *
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
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room) //Room::find(wildcard);
    {   
	
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
		
        //$room = Room::find($id);

        //return $room;

        return view('rooms.show', compact('room', 'rooms', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
		
		DB::table('room')
			->where('id', $id)
			->update(array('name' => $Room_name, 'capacity' => $Room_capacity, 'equipment' => $Room_Equipment));
			
		return redirect()->route('room_profile', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
