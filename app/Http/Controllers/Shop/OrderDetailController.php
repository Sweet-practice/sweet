<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\OrderStatus;
use App\Order;
use App\OrderDetail;
use App\User;

class OrderDetailController extends Controller
{
	public function show($id)
  {
  	$user = User::find($id);
    $orders = Order::where('user_id', $id)->get();
    return view('shop/order_details.show', ['orders' => $orders, 'user' => $user]);
  }

  public function edit($id)
  {
    $order_details = Order::find($id);
    $status = OrderStatus::toSelectArray();
    return view('shop/order_details.edit', ['order_details' => $order_details, 'status' => $status]);
  }
}
