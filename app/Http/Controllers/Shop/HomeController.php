<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Order;
use App\Message;
use App\User;
use App\Sweet;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:shop');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $order = Order::select('id')->whereDate('created_at', Carbon::today())->get();
      $message = Message::select('id')->whereDate('created_at', Carbon::today())->get();
      $categories = Category::all();
      return view('shop.home', ['order' => $order, 'message' => $message, 'categories' => $categories]);
    }

    public function search(Request $request){
      $value = $request['value'];
      $name = $request['name'];
      if($value === 'ユーザー'){
        $search = User::select('id', 'name')->where('name', 'like', '%'.$name.'%')->get();
        return view('shop.search', ['search' => $search, 'value' => $value, 'name' => $name]);
      }
      if($value === 'お菓子'){
        $search = Sweet::select('id', 'name', 'path')->where('name', 'like', '%'.$name.'%')->where('category_id', $request->category)->get();
        return view('shop.search', ['search' => $search, 'value' => $value, 'name' => $name]);
      }
    }
}
