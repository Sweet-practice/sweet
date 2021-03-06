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



  public static function confirm($id)
  {
  	$getcourpons = GetCourpon::where('user_id', $id)->where('flag',"Unacquired")->get();
  	$carts = Cart::where('user_id',$id)->get();
    if(count($carts) > 0){
      foreach ($carts as $cart){
        if($cart->sweet->stock - $cart->amout < 0){
            $stock = 'こちらの商品の在庫が不足しているためご購入いただけません。';
            break;
        }else{
        	$stock = '';
        }
      }
      return [$carts, $stock, $getcourpons];
    }else{
      $stock = '';
      return [$carts, $stock, $getcourpons];
    }
  }

  public static function calculation($courpon, $user_id)
  {
    $carts = Cart::where('user_id',$user_id)->get();
    $total = 0;
    if($courpon != 0){
      $getcourpon = GetCourpon::find($courpon);
      if(!is_null($getcourpon->parcent)){
        foreach($carts as $cart){
          if(is_null($getcourpon->category_id) or $cart->sweet->category_id == $getcourpon->category_id){
            $total += ($cart->sweet->price * $cart->amout) - (($cart->sweet->price * $cart->amout) * $getcourpon->parcent / 100);
          }
          else{
            $total += $cart->sweet->price;
          }
        }
        return $total;
      }
      elseif(!is_null($getcourpon->price)){
        foreach($carts as $sweet){
          $total += $sweet->sweet->price;
        }
        if($getcourpon->price <= $total){
          $total = $total - $getcourpon->price;
        }
        elseif($getcourpon->price >= $total){
          $total = "ご指定のクーポンは使用できません。";
        }
        return $total;
      }
    }
    elseif($courpon == 0){
      foreach($carts as $sweet){
        $total += $sweet->sweet->price * $sweet->amout;
      }
      return $total;
    }
  }
}
