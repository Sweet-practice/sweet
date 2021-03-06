<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Sweet;
use App\Notification;
use App\GetCourpon;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $count = Notification::aggregate(Auth::user()->id);
        $data = Cart::confirm(Auth::user()->id);
        return view('user/carts/cart_index',['carts' => $data[0],'stock' => $data[1],'getcourpons' => $data[2], 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $count = Notification::aggregate(Auth::user()->id);
        $cart = new Cart;
        $cart->fill($request->all())->save();
        $data = Cart::confirm(Auth::user()->id);
        return view('user/carts/cart_index',['carts' => $data[0],'stock' => $data[1],'getcourpons' => $data[2], 'count' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
      $count = Notification::aggregate(Auth::user()->id);
      $data = Cart::confirm(Auth::user()->id);
      $discount = Cart::calculation($request->courpon, Auth::user()->id);

      return view('user/carts/cart_index',['discount' => $discount, 'carts' => $data[0],'stock' => $data[1],'getcourpons' => $data[2],'courpon' => $request->courpon, 'count' => $count]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $count = Notification::aggregate(Auth::user()->id);
        $cart = Cart::find($id);
        $cart->delete();
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        return view('user/carts/cart_index',['carts' => $carts, 'count' => $count]);
    }
}
