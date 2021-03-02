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

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'shop'], function() {
    Route::get('/',         function () { return redirect('/shop/home'); });
    Route::get('login',     'Shop\LoginController@showLoginForm')->name('shop.login');
    Route::post('login',    'Shop\LoginController@login');
});

Route::group(['prefix' => 'shop', 'middleware' => 'auth:shop'], function() {
    Route::post('logout',   'Shop\LoginController@logout')->name('shop.logout');
    Route::get('home',      'Shop\HomeController@index')->name('shop.home');
});
