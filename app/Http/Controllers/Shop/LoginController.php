<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/shop/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:shop')->except('logout');
    }

    public function showLoginForm()
    {
        return view('shop.login');  //変更
    }
 
    protected function guard()
    {
        return Auth::guard('shop');  //変更
    }
    
    public function logout(Request $request)
    {
        Auth::guard('shop')->logout();  //変更
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/shop/login');  //変更
    }
}
