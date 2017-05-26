<?php

namespace App;

use App\Observers\userObserver;
use DB;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
/**
* Class for the User model. Used to create dynamic user objects which can be assigned variables.
*
*/
class User extends Authenticatable
{
    use Notifiable;
	use EntrustUserTrait;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone', 'company', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
