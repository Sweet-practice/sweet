<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ユーザー側

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('sweets', 'SweetController')->only(['index', 'show']);

Route::group(['middleware' => 'auth:user'], function() {
  Route::resource('favorites', 'FavoriteController')->only(['index']);
  Route::resource('carts', 'CartController')->only(['index']);
  Route::resource('orders', 'OrderController')->only(['index', 'create', 'show']);
  Route::resource('rooms', 'RoomController')->only(['show']);
  Route::resource('messages', 'MessageController')->only(['index', 'show', 'create']);
});


// お店側

Route::group(['prefix' => 'shop'], function() {
    Route::get('/',         function () { return redirect('/shop/home'); });
    Route::get('login',     'Shop\LoginController@showLoginForm')->name('shop.login');
    Route::post('login',    'Shop\LoginController@login');
});

Route::group(['prefix' => 'shop', 'middleware' => 'auth:shop'], function() {
    Route::post('logout',   'Shop\LoginController@logout')->name('shop.logout');
    Route::get('home',      'Shop\HomeController@index')->name('shop.home');
    Route::resource('categories', 'Shop\CategoryController');
    Route::resource('sweets', 'Shop\SweetController');
    Route::resource('rooms', 'Shop\RoomController')->only(['index', 'show']);
    Route::resource('messages', 'Shop\MessageController')->only(['index', 'show', 'create']);
});
