<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Enums\OrderStatus;
use App\Order;
use App\OrderDetail;
use App\Notification;

class OrderController extends Controller
{
  public function index($i)
  {
    if($i === 'today'){
      $orders = Order::whereDate('created_at', Carbon::today())->get();
      $i = '今日のご注文';
      return view('shop/orders.index', ['orders' => $orders, 'i' => $i]);
    }
  	elseif($i === 'Untreated'){
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

  public function update(Request $request)
  {
    $order = Order::find($request->order_id);
    $order->status = $request->status;
    $order->save();

    if($order->status == 'Shipping'){
      $notification = new Notification;
      $notification->user_id = $order->user_id;
      $notification->order_id = $order->id;
      $notification->title = 'ご注文の商品が発送されました！';
      $notification->content = 'ご注文の商品が発送されました！２日ほどお待ちください。';
      $notification->save();
    }

    $status = OrderStatus::toSelectArray();

    return view('shop/order_details.edit', ['order_details' => $order, 'status' => $status]);
  }

}
