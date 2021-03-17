<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  public function Rooms()
  {
    return $this->hasMany('App\Room');
  }

  public function Messages()
  {
    return $this->hasMany('App\Message');
  }
}
