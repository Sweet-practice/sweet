<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  protected $fillable = ['order_id', 'sweet_id', 'sweet_name', 'amout', 'price'];
  public function user()
	  {
	    return $this->belongsTo('App\Order');
	  }
}
