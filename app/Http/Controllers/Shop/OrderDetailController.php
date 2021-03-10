<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;

class OrderDetailController extends Controller
{
  public function show($id)
  {
    $order_details = Order::find($id);
    return view('shop/order_details.show', ['order_details' => $order_details]);
  }
}
