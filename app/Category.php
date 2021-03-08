<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function sweets()
  {
      // カテゴリは複数のsweetを持つ
      return $this->hasMany('App\Sweet');
  }

	protected $table = 'categories';
	protected $fillable =
	[
	  'name'
	];
}
