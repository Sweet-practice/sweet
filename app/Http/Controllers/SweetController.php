<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\BaseClass;
use Auth;
use App\Sweet;
use App\Category;
use App\Favolite;
use App\Review;
use App\Notification;

class SweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $count = Notification::aggregate(Auth::user()->id);
        }else{
            $count = "";
        }
        $shop = BaseClass::terminaltype();
        $categorys  = Category::all();
        $order_details = Sweet::withCount('orderDetails')->orderBy('order_details_count', 'desc')->limit(5)->get();
        $sweets = Sweet::withCount('favolits')->orderBy('favolits_count', 'desc')->limit(5)->get();
        return view('user/sweets/sweet', ['categorys' => $categorys, 'shop' => $shop, 'sweets' => $sweets, 'order_details' => $order_details, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $review = new Review;
      $review->user_id = $request->userId;
      $review->sweet_id = $request->sweetId;
      $review->title = $request->title;
      $review->body = $request->content;
      $review->star = $request->star;
      $review->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sweet $sweet)
    {
        if(Auth::user()){
            $count = Notification::aggregate(Auth::user()->id);
        }else{
            $count = "";
        }
        $category  = Category::find($sweet->category_id);
        $favolite = $sweet->where('id', '=', $sweet->id)->withCount('favolits')->get();
        $average = Review::where('sweet_id', $sweet->id)->get()->avg('star');
        $avg = round($average, 2);
        // dd($avg);
        // dd(floor($avg));
        // dd(substr(strrchr($avg, '.'), 1));
        $like_model = new Favolite;

        $data = [
                'like_model'=>$like_model,
                'favolite' => $favolite,
            ];
        return view('user/sweets/sweet_show',$data,['sweet' => $sweet, 'category' => $category, 'avg' => $avg, 'count' => $count]);
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

    public function search(Request $request){
        if(Auth::user()){
            $count = Notification::aggregate(Auth::user()->id);
        }else{
            $count = "";
        }
        $data = [];
        $like_model = new Favolite;

        $data = [
                'like_model'=>$like_model,
            ];
        if(isset($request['name'])){
            $name = $request['name'];
            $search = Sweet::select('id', 'name', 'path')->where('name', 'like', '%'.$name.'%')->withCount('favolits')->get();
            return view('user/sweets/search', $data, ['search' => $search, 'name' => $name, 'count' => $count]);
        }
        elseif(isset($request['category'])){
            $id = $request['category'];
            $name = $request['category_name'];
            $search = Sweet::select('id', 'name', 'path')->where('category_id', 'like', '%'.$id.'%')->withCount('favolits')->get();
            return view('user/sweets/search', $data, ['search' => $search, 'name' => $name, 'id' => $id, 'count' => $count]);
        }
    }
}
