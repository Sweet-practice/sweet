<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  public function sweet()
  {
      return $this->belongsTo('App\Sweet');
  }
}
