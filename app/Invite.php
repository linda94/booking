<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
  /**
   * Properties that can be mass assigned
   *
   * @var array
   */
  protected $fillable = array('code', 'email');
}
