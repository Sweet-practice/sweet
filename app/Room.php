<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

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

  public static function unreadCount($user_id){
  	return Message::where('user_id',$user_id)->where('status', '=', 'Unread')->count();
  }
}
