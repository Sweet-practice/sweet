<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function shop()
  {
    return $this->belongsTo('App\Shop');
  }

  public function messages()
  {
    return $this->hasMany('App\Message');
  }
}
