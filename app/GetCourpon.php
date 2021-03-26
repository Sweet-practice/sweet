<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetCourpon extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function courpons()
    {
        return $this->belongsTo('App\Courpon');
    }
}
