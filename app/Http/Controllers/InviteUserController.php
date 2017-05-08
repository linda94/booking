<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Room;
use DB;
use Mail;

class InviteUserController extends Controller
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
        return view('/invite_user', compact('rooms', 'users'));
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
        //
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
        //
    }
	
	public function send(Request $request)
	{
		$email = $request->get('email');

		Mail::send('emails.send', ['email' => $email], function ($message) use ($email)
		{
			$message->from('kevad95@gmail.com', 'BAM - Book And Meet');
			$message->to($email);
			$message->subject('Test');
		});

		$success = "Du har invitert " . $email . " til din l&oslash;sning";
		
		return redirect()->route('invite_user_index')->with(compact('success'));
	}
}
