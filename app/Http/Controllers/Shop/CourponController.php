<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Courpon;
use App\GetCourpon;
use App\Category;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourponController extends Controller
{
  public function index()
  {
    $courpons = Courpon::all();
    return view('shop/courpons.index',['courpons' => $courpons]);
  }

  public function show($courpon)
  {
    $courpon = Courpon::find($courpon);
    return view('shop/courpons.show',['courpon' => $courpon]);
  }

  public function create()
  {
    $categories = Category::all();
    return view('shop/courpons.create',['categories' => $categories]);
  }

  public function store(Request $request)
  {
    $upload_info = Storage::disk('s3')->putFile('/courpon', $request->file('file'), 'public');
    $path = Storage::disk('s3')->url($upload_info);

  	$courpon = new Courpon;
  	$courpon->category_id = $request->category_id;
    $courpon->name = $request->name;
  	if($request->method == 'price'){
  		$courpon->price = $request->content;
  	}elseif($request->method == 'parcent'){
  		$courpon->parcent = $request->content;
  	}
  	$courpon->in_force = $request->in_force;
  	$courpon->image_path = $path;
  	$courpon->save();

    $users = User::where('delete_flug', 'activeUser')->get();
    foreach($users as $user){
      $notification = new Notification;
      $notification->user_id = $user->id;
      $notification->courpon_id = $courpon->id;
      $notification->title = '新しいクーポンが発行されました！';
      $notification->content = $courpon->name.'というクーポンです！早速使ってみましょう！';
      $notification->save();
    }

    $courpons = Courpon::all();
    return view('shop/courpons.index',['courpons' => $courpons]);
  }

  public function destroy($id)
  {
    $courpon = Courpon::find($id);
    // Courpon::getcoupondelete($id);
    $courpon->getcourpons()->forceDelete();
    $courpon->delete();
    $courpons = Courpon::all();
    return view('shop/courpons.index',['courpons' => $courpons]);
  }
}
