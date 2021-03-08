@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-right">
                <form action="{{ route('search') }}" method="post" id="search">
                @csrf
                    <input type="text" name="name">
                    <button type="submit">検索</button>
                </form>
            </div>
            <h1>スイーツ紹介</h1>
            <div class="row">
                <img src="image/cake1.jpeg" alt="ケーキ画像">
                <img src="image/sweet1.jpeg" class="w-25" alt="お菓子画像">
            </div>
        </div>
        <div class="col-md-12 mt-3 p-5 bg-danger">
            <h2>店のこだわり</h2>
            <p>あああああああああああああああああ</p>
            <p>あああああああああああああああああ</p>
            <p>あああああああああああああああああ</p>
        </div>

        <div class="col-md-12 mt-3 p-5">
            <h2>売れ筋TOP5</h2>
            <div class="row justify-content-between">
                <div class="m-1" style="width:150px">
                    <img src="image/cake1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                    <a href="#"><h5>商品名</h5></a>
                    <p>商品紹介</p>
                </div>
                <div class="m-1" style="width:150px">
                    <img src="image/sweet1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                    <a href="#"><h5>商品名</h5></a>
                    <p>商品紹介</p>
                </div>
                <div class="m-1" style="width:150px">
                    <img src="image/sweet1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                    <a href="#"><h5>商品名</h5></a>
                    <p>商品紹介</p>
                </div>
                <div class="m-1" style="width:150px">
                    <img src="image/sweet1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                    <a href="#"><h5>商品名</h5></a>
                    <p>商品紹介</p>
                </div>
                <div class="m-1" style="width:150px">
                    <img src="image/cake1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                    <a href="#"><h5>商品名</h5></a>
                    <p>商品紹介</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3 p-5">
            <h2>お気に入り数TOP5</h2>
            <div class="row justify-content-between">
                    <div class="m-1" style="width:150px">
                        <img src="image/cake1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                    <div class="m-1" style="width:150px">
                        <img src="image/sweet1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                    <div class="m-1" style="width:150px">
                        <img src="image/sweet1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                    <div class="m-1" style="width:150px">
                        <img src="image/sweet1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                    <div class="m-1" style="width:150px">
                        <img src="image/cake1.jpeg" class="w-100" style="height:100px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                </div>
        </div>

        <div class="col-md-12 mt-3 p-5">
            <h2>カテゴリー一覧</h2>
            <div class="row justify-content-between">
                <div class="col-md-4 mt-1 mb-1">
                    <a href="#" class="h5">-ケーキ</a>
                </div>
                <div class="col-md-4 mt-1 mb-1">
                    <a href="#" class="h5">-焼き菓子</a>
                </div>
                <div class="col-md-4 mt-1 mb-1">
                    <a href="#" class="h5">-洋菓子</a>
                </div>
                <div class="col-md-4 mt-1 mb-1">
                    <a href="#" class="h5">-和菓子</a>
                </div>
                <div class="col-md-4 mt-1 mb-1">
                    <a href="#" class="h5">-チョコレート</a>
                </div>
                <div class="col-md-4 mt-1 mb-1">
                    <a href="#" class="h5">-アイス</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
