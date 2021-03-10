<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sweet;
use App\Category;

class SweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys  = Category::all();
        return view('sweet', ['categorys' => $categorys]);
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
        $category  = \App\Category::find($sweet->category_id);
        return view('sweet_show',['sweet' => $sweet, 'category' => $category]);
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
        if(isset($request['name'])){
            $name = $request['name'];
            $search = Sweet::select('id', 'name', 'path')->where('name', 'like', '%'.$name.'%')->get();
            return view('search', ['search' => $search, 'name' => $name]);
        }
        elseif(isset($request['category'])){
            $id = $request['category'];
            $name = $request['category_name'];
            $search = Sweet::select('id', 'name', 'path')->where('category_id', 'like', '%'.$id.'%')->get();
            return view('search', ['search' => $search, 'name' => $name, 'id' => $id]);
        }
    }
}
