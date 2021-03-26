<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Courpon;
use App\GetCourpon;
use App\Notification;

class CourponController extends Controller
{
  public function index()
  {
    $count = Notification::aggregate(Auth::user()->id);
    $courpons = Courpon::all();
    return view('user/courpons.index',['courpons' => $courpons, 'count' => $count]);
  }

  public function show($id)
  {
    $count = Notification::aggregate(Auth::user()->id);
    $courpon = Courpon::find($id);
    $get_courpon = GetCourpon::where("courpon_id", $id)->first();
    return view('user/courpons.show',['courpon' => $courpon, 'get_courpon' => $get_courpon, 'count' => $count]);
  }

  public function store(Request $request)
  {
    $courpon = Courpon::find($request->courponId);
    $get_courpon = new GetCourpon;
    $get_courpon->courpon_id = $courpon->id;
    $get_courpon->name = $courpon->name;
    $get_courpon->user_id = Auth::user()->id;
    $get_courpon->category_id = $courpon->category_id;

    if(!is_null($courpon->price)){
      $get_courpon->price = $courpon->price;
    }elseif(!is_null($courpon->parcent)){
      $get_courpon->parcent = $courpon->parcent;
    }

    $get_courpon->in_force = $courpon->in_force;
    $get_courpon->save();
  }
}
