<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CourponController extends Controller
{
    public function create()
    {
      $categories = Category::all();
      return view('shop/courpons.create',['categories' => $categories]);
    }

    public function store(Request $request)
    {
    	dd($request->all());
    	$courpon = new Courpon;
    	$courpon->category_id = $request->category_id;
    	if(isset($request->price)){
    		$courpon->price = $request->price;
    	}elseif(isset($request->parcent)){
    		$courpon->parcent = $request->parcent;
    	}
    	$courpon->in_force = $request->in_force;
    	$courpon->image_path;
    	$courpon->save();
    }
}
