<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sweet extends Model
{
  public function category()
  {
      // 投稿は複数のコメントを持つ
      return $this->belognsTo('App\Category');
  }

  public function images()
  {
      return $this->hasMany('App\Image');
  }

	public function favolits()
  {
      return $this->hasMany('App\Favolite');
  }

	protected $table = 'sweets';
	protected $fillable =
	[
	  'name',
	  'stock',
	  'introduction',
	  'price',
	  'allergy',
	  'path'
	];
}
