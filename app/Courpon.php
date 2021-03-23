<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courpon extends Model
{
    protected $fillable =
	[
	  'price',
	  'parcent',
	  'image_path',
	  'in_force',
	];

    public function category()
    {
        return $this->hasMany('App\Category');
    }
}
