<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\BaseClass;
use Auth;
use App\Cart;
use App\Sweet;
use App\Order;
use App\OrderDetail;
use App\GetCourpon;
use App\Notification;
use App\Point;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Notification::aggregate(Auth::user()->id);
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        $shop = BaseClass::terminaltype();
        return view('user/orders/order_index',['orders' => $orders, 'shop' => $shop, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $count = Notification::aggregate(Auth::user()->id);
      $data = Cart::confirm(Auth::user()->id);
      $point = Point::where('user_id',Auth::user()->id)->first();
      return view('user/orders/order_create',['carts' => $data[0],'getcourpons' => $data[2], 'discount' => $request->total, 'courpon' => $request->courpon, 'point' => $point, 'count' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $count = Notification::aggregate(Auth::user()->id);
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->postage = $request->postage;
        $order->total_price = $request->total_price - $request->use_point;
        $order->total_point = $request->total_point;
        $order->use_point = $request->use_point;
        $order->save();
        $orderId = $order->id;

        foreach ($carts as $cart){
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->sweet_id = $cart->sweet->id;
            $order_detail->sweet_name = $cart->sweet->name;
            $order_detail->amout = $cart->amout;
            $order_detail->price = $cart->amout*$cart->sweet->price;
            $order_detail->save();
            Cart::where('id',$cart->id)->delete();

            $sweet = Sweet::find($cart->sweet->id);
            $sweet->stock = $sweet->stock - $cart->amout;
            if($sweet->stock == '0'){
                $sweet->status = 'OutOfStock';
            }elseif($sweet->stock <= '10'){
                $sweet->status = 'LowInventory';
            }
            $sweet->save();
        }

        // if文追加
        if(!is_null($request->courpon)){
          $getcourpon = GetCourpon::find($request->courpon);
          $getcourpon->flag = 'Acquired';
          $getcourpon->save();
        }
       //  ここまで

        $points = Point::where('user_id',Auth::user()->id)->first();
        if(empty($points)){
            $point = new Point;
            $point->user_id = Auth::user()->id;
            $point->value = $request->total_point;
            $point->save();
        }else{
            $points->value += $request->total_point - $request->use_point;
            $points->save();
        }
        $request->session()->regenerateToken();

        $orders = Order::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        $shop = BaseClass::terminaltype();
        return view('user/orders/order_index',['orders' => $orders, 'shop' => $shop, 'count' => $count]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $count = Notification::aggregate(Auth::user()->id);
        $order_detail = OrderDetail::where('order_id',$order->id)->get();
        return view('user/orders/order_show',['order_detail' => $order_detail, 'order' => $order, 'count' => $count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
