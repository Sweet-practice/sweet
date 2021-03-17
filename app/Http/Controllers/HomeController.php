<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Sweet;
use App\Favolite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sweets = Sweet::withCount('favolits')->whereHas('favolits', function($q){
            $q->where('user_id', Auth::user()->id);})->get();
        $like_model = new Favolite;
        $data = [
                'like_model'=>$like_model,
            ];
        return view('home',$data,['sweets' => $sweets]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user_form = $request->all();
        $user = Auth::user();
        $user_form['password'] = bcrypt($request->password);
        $user->fill($user_form)->save();
        return view('home');
    }
}
