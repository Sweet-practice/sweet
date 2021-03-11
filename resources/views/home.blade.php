@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>{{ Auth::user()->name }} さんのマイページ</h2>
            <div class="text-right">
                <form action="{{ route('search') }}" method="post" id="search">
                @csrf
                    <input type="text" name="name" placeholder="商品名検索">
                    <button type="submit">検索</button>
                </form>
            </div>
            <div class="col-md-11 mt-3 mx-auto">
                <h3>お気に入り商品</h3>
                <!-- <h4 class="text-center mt-5">お気に入りの商品は登録されていません。</h4> -->
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="m-1 w-25">
                        <div class="w-50 ml-auto text-right">お気に入り数❤️</div>
                        <img src="image/cake1.jpeg" class="w-100" style="height:200px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                    <div class="m-1 w-25">
                        <div class="w-50 ml-auto text-right">お気に入り数❤️</div>
                        <img src="image/sweet1.jpeg" class="w-100" style="height:200px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                    <div class="m-1 w-25">
                        <div class="w-50 ml-auto text-right">お気に入り数❤️</div>
                        <img src="image/sweet1.jpeg" class="w-100" style="height:200px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                    <div class="m-1 w-25">
                        <div class="w-50 ml-auto text-right">お気に入り数❤️</div>
                        <img src="image/sweet1.jpeg" class="w-100" style="height:200px" alt="お気に入り">
                        <a href="#"><h5>商品名</h5></a>
                        <p>商品紹介</p>
                    </div>
                </div>
            </div>
            <div class="col-md-11 mt-3 mx-auto">
                <h3>おすすめ商品</h3>
                <div class="d-flex justify-content-between flex-wrap">
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
        </div>
    </div>
</div>
@endsection
