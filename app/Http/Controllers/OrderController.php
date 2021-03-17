<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\BaseClass;
use Auth;
use App\Cart;
use App\Sweet;
use App\Order;
use App\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        $shop = BaseClass::terminaltype();
        return view('order_index',['orders' => $orders, 'shop' => $shop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        foreach ($carts as $cart){
            if($cart->sweet->stock - $cart->amout < 0){
                $stock = 'こちらの商品の在庫が不足しているためご購入いただけません。';
                return view('order_create',['carts' => $carts,'stock' => $stock]);
            }
        }
        return view('order_create',['carts' => $carts]);
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

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->postage = $request->postage;
        $order->total_price = $request->total_price;
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

        // Cart::where('user_id',Auth::user()->id)->delete();
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order_detail = OrderDetail::where('order_id',$order->id)->get();
        return view('order_show',['order_detail' => $order_detail, 'order' => $order]);
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
        //
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
