<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use DB;

class RoomListController extends Controller
{
    public function index(Room $room){
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();
		return view('/room_list', compact('room', 'rooms', 'users'));
	}
}
