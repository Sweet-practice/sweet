<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
      'content',
  ];

	public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function room()
  {
    return $this->belongsTo('App\Room');
  }

  public function shop()
  {
    return $this->belongsTo('App\Shop');
  }
}
