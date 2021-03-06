<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['user_id', 'postage', 'total_price'];
  public function user()
  {
    return $this->belongsTo('App\User');
  }
    public function order_details()
  {
    return $this->hasMany('App\OrderDetail');
  }
}
