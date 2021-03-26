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

  public function orderDetails()
  {
      return $this->hasMany('App\OrderDetail');
  }

  public function cart()
  {
    return $this->hasOne('App\Cart');
  }

	protected $table = 'sweets';
	protected $fillable =
	[
	  'name',
	  'stock',
	  'point',
	  'introduction',
	  'price',
	  'allergy',
	  'path'
	];
}
