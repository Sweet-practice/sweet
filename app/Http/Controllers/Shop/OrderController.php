<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
  public function index($i)
  {
  	if($i === 'Untreated'){
  		$orders = Order::where('status', '=', 'Untreated')->get();
  		$i = '未発送';
  		return view('shop/orders.index', ['orders' => $orders, 'i' => $i]);
  	}
  	elseif($i === 'undispatched'){
  		$orders = Order::where('status', '=', 'undispatched')->get();
  		$i = '未発送';
  		return view('shop/orders.index', ['orders' => $orders, 'i' => $i]);
  	}
  	elseif($i === 'shipping'){
  		$orders = Order::where('status', '=', 'shipping')->get();
  		$i = '発送中';
  		return view('shop/orders.index', ['orders' => $orders, 'i' => $i]);
  	}
  	elseif($i === 'sent'){
  		$orders = Order::where('status', '=', 'sent')->get();
  		$i = '発送済み';
  		return view('shop/orders.index', ['orders' => $orders, 'i' => $i]);
  	}
  }

}
