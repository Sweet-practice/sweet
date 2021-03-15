<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'birth', 'email', 'address', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function orders()
  {
      // カテゴリは複数のsweetを持つ
      return $this->hasMany('App\Order');
  }

  public function rooms()
  {
    return $this->hasMany('App\Room');
  }
  
  // ユーザーがいいねしている投稿
    public function favolits()
    {
        return $this->hasMany('App\Favolite');
    }
}
