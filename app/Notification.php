<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public static function aggregate($id)
    {
    	
    }
}
