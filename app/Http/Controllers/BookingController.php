<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Room;
use App\Booking;
class BookingController extends Controller
{
    /**
     * Returns booking view
     * Retrieves room and user data from the DB and passes them to booking view
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room)
    {
            // OBS: bookings, ikke booking (flertall)
        $bookings = DB::table('bookings')->get();
		$rooms = DB::table('room')->get();
		$users = DB::table('users')->get();

        //return response()->json(compact('bookings', 'rooms', 'users'))->view('bookingV', compact('rooms', 'users'));

        return view('bookingV', compact('bookings', 'rooms', 'users'));
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
        $booking = new Booking;

        $booking -> from = $request->from;
        $booking -> to = $request->to;
        $booking -> room_id = $request->room_id; //skifte til room_id
        $dateStr = $request->dateString;
        $booking -> dateString = $dateStr;
        $booking-> user_id = $request->user_id;

        $booking->save();

        return redirect()->back()->with(compact('dateStr'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = DB::table('bookings')->find($id);

        return view('bookings.show', compact('booking'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = DB::table('bookings')->find($id);
        $dateStr = $booking->dateString;
        DB::table('bookings')->where('id', $id)->delete();

        //return redirect('/bookingV');
        return redirect()->back()->with(compact('dateStr'));

        //return response()->json(compact('bookings', 'rooms', 'users'))->view('bookingV', compact('rooms', 'users'));
    }
}
