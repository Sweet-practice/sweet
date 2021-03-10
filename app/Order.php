<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'postage', 'total_price'];

    public function order_detail()
  {
      return $this->hasMany('App\OrderDetail');
  }
}
