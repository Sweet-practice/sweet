<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\BaseClass;
use App\Sweet;
use App\Category;
use App\Favolite;

class SweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = BaseClass::terminaltype();
        $categorys  = Category::all();
        return view('sweet', ['categorys' => $categorys, 'shop' => $shop]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sweet $sweet)
    {
        $category  = Category::find($sweet->category_id);
        $favolite = $sweet->where('id', '=', $sweet->id)->withCount('favolits')->get();
        $like_model = new Favolite;

        $data = [
                'like_model'=>$like_model,
                'favolite' => $favolite,
            ];
        return view('sweet_show',$data,['sweet' => $sweet, 'category' => $category]);
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
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        // $sweets = Sweet::withCount('favolits')->get();
        // dd($sweets);
        // foreach($sweets as $sweet) {
        //     $sweet_data[] = $sweet->favolits_count;
        // }
        $like_model = new Favolite;

        $data = [
                'like_model'=>$like_model,
            ];
        if(isset($request['name'])){
            $name = $request['name'];
            $search = Sweet::select('id', 'name', 'path')->where('name', 'like', '%'.$name.'%')->withCount('favolits')->get();
            return view('search', $data, ['search' => $search, 'name' => $name]);
        }
        elseif(isset($request['category'])){
            $id = $request['category'];
            $name = $request['category_name'];
            $search = Sweet::select('id', 'name', 'path')->where('category_id', 'like', '%'.$id.'%')->withCount('favolits')->get();
            return view('search', $data, ['search' => $search, 'name' => $name, 'id' => $id]);
        }
    }
}
