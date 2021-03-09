<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'sweet_id', 'amout'];

    public function sweet()
  {
      return $this->belongsTo('App\Sweet');
  }
}
