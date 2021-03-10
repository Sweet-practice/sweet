<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Message;
use App\User;
use App\Sweet;
use App\Enums\PublishStatus;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);
      if(is_null($user)){
        \Session::flash('err_msg', 'データがありません。');
        return redirect(route('users'));
      }
      return view('shop/users.show', ['user' => $user]);
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
      $user = User::find($id);
      $user->delete_flug = 'deleteUser';
      $user->save();

      return redirect(route('shop.home'));
    }
}
