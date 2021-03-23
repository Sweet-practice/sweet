<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\BaseClass;
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
        $shop = BaseClass::terminaltype();

        $randoms = Sweet::inRandomOrder()->limit(5)->get();
        $data = [
                'sweets' => $sweets,
                'like_model'=>$like_model,
                'randoms'=>$randoms,
        ];
      return view('home', $data, ['shop' => $shop]);
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
        return redirect()->action('HomeController@index');
    }
}
