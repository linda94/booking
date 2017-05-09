<?php

namespace App\Observers;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\ServiceProvider;

class userObserver

{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->attachRole(3);
		\Mail::to($user)->send(new Welcome);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}