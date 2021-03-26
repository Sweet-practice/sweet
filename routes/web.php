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


Auth::routes();


// ユーザー側

Route::get('/', 'HomeController@index')->name('home');
Route::resource('sweets', 'SweetController',['names' => ['index' => 'index','show' => 'show']])->only(['index', 'show']);
Route::post('sweets', 'SweetController@search')->name('search');

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home/edit', 'HomeController@edit')->name('edit');
    Route::post('/home/edit', 'HomeController@update')->name('update');
    Route::resource('favorites', 'FavoriteController')->only(['index']);
    Route::post('/ajaxlike', 'FavoriteController@ajaxlike')->name('favorits.ajaxlike');
    Route::resource('carts', 'CartController')->only(['index', 'update']);
    Route::post('carts', 'CartController@create')->name('carts.create');
    Route::delete('carts/{id}', 'CartController@destroy')->name('carts.destroy');
    Route::resource('orders', 'OrderController')->only(['create', 'store', 'show']);
    Route::get('orders', 'OrderController@index')->name('user.order.index');
    Route::get('rooms', 'RoomController@index')->name('user.rooms.index');
    Route::post('messages', 'MessageController@store')->name('user.messages.store');
    Route::post('/comment', 'SweetController@store')->name('comment.store');
    Route::resource('courpon', 'CourponController')->only(['index', 'show', 'store']);
});


// お店側

Route::group(['prefix' => 'shop'], function() {
    Route::get('/',         function () { return redirect('/shop/home'); });
    Route::get('login',     'Shop\LoginController@showLoginForm')->name('shop.login');
    Route::post('login',    'Shop\LoginController@login');
});

Route::group(['prefix' => 'shop', 'middleware' => 'auth:shop'], function() {
    Route::get('search', 'Shop\HomeController@search')->name('shop.search');
    Route::get('/orders/{status}', 'Shop\OrderController@index')->name('orders.index');
    Route::post('logout', 'Shop\LoginController@logout')->name('shop.logout');
    Route::get('home', 'Shop\HomeController@index')->name('shop.home');
    Route::resource('users', 'Shop\UserController')->only(['show', 'update']);
    Route::resource('categories', 'Shop\CategoryController');
    Route::resource('sweets', 'Shop\SweetController');
    Route::resource('rooms', 'Shop\RoomController')->only(['index', 'show']);
    Route::resource('messages', 'Shop\MessageController')->only(['index', 'show', 'create', 'store']);
    Route::resource('orders', 'Shop\OrderController')->only(['update']);
    Route::resource('order_details', 'Shop\OrderDetailController')->only(['show', 'edit']);
    Route::get('courpon/create', 'Shop\CourponController@create')->name('courpon.create');
    Route::resource('courpons', 'Shop\CourponController');
});
