<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Sweet;
use App\Image;
use App\Http\Requests\SweetRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      return view('shop/sweets.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SweetRequest $request)
    {
      //S3へのファイルアップロード処理の時の情報を変数$upload_infoに格納する
      $upload_info = Storage::disk('s3')->putFile('/test', $request->file('file'), 'public');
      //S3へのファイルアップロード処理の時の情報が格納された変数$pathを用いてアップロードされた画像へのリンクURLを変数$pathに格納する
      $path = Storage::disk('s3')->url($upload_info);
      $input = new Sweet();
      $input->name = $request->name;
      $input->category_id = $request->category_id;
      $input->stock = $request->stock;
      $input->introduction = $request->introduction;
      $input->price = $request->price;
      $input->allergy = $request->allergy;
      $input->path = $path;
      $input->save();

      $sub_images = $request->file('sub_image');

      foreach($sub_images as $sub_image){
        $sub = Storage::disk('s3')->putFile('/sub', $sub_image, 'public');
        $sub_path = Storage::disk('s3')->url($sub);
        $image = new Image();
        $image->sweet_id = $input->id;
        $image->url = $sub_path;
        $image->save();
      }
        return redirect(route('shop.home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sweet = Sweet::find($id);
      return view('shop/sweets.show', ['sweet' => $sweet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $sweet = Sweet::find($id);
      $categories = Category::all();
      return view('shop/sweets.edit', ['sweet' => $sweet, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SweetRequest $request)
    {
      $sweet = Sweet::find($request->id);
      $old_path = basename($sweet->path);
      if(!empty($request->file)){
        Storage::disk('s3')->delete('test/'.$old_path);
        $upload_info = Storage::disk('s3')->putFile('/test', $request->file('file'), 'public');
        $path = Storage::disk('s3')->url($upload_info);
      }

      $sweet->name = $request->name;
      $sweet->category_id = $request->category_id;
      $sweet->stock = $request->stock;
      $sweet->introduction = $request->introduction;
      $sweet->price = $request->price;
      $sweet->allergy = $request->allergy;
      if(isset($path)){
        $sweet->path = $path;
      }elseif(empty($path)){
        $sweet->path = $sweet->path;
      }
      $sweet->save();

      $sub_images = $request->file('sub_image');
      $sub_oldimage = $sweet->images;
      $images = Image::where('sweet_id', $request->id)->get();
      $count = count($sub_oldimage);
      if($count >= 1){
        for($i = $count - 1; $i >= 0; $i--){
          Storage::disk('s3')->delete('sub/'.basename($sub_oldimage[$i]->url));
          $images[$i]->delete();
        }
      }

      if(!is_null($sub_images)){
        foreach($sub_images as $sub_image){
          $sub = Storage::disk('s3')->putFile('/sub', $sub_image, 'public');
          $sub_path = Storage::disk('s3')->url($sub);
          $image = new Image();
          $image->sweet_id = $request->id;
          $image->url = $sub_path;
          $image->save();
        }
      }
        return redirect(route('shop.home'));
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
}
