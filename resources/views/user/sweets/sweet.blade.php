@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-right">
                <form action="{{ route('search') }}" method="post" id="search">
                @csrf
                    <input type="text" name="name" placeholder="商品名検索">
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
                @foreach($order_details as $order_detail)
                <div class="m-1" style="width:150px">
                    <a href="{{ route('show', ['sweet' => $order_detail->id]) }}">
                        <img src="{{ $order_detail->path }}" class="w-100" style="height:100px" alt="お気に入り">
                        <h5>{{ $order_detail->name }}</h5>
                    </a>
                    <p>{{ $order_detail->introduction }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-12 mt-3 p-5">
            <h2>お気に入り数TOP5</h2>
            <div class="row justify-content-between">
                @foreach($sweets as $sweet)
                <div class="m-1" style="width:150px">
                    <a href="{{ route('show', ['sweet' => $sweet->id]) }}">
                        <img src="{{ $sweet->path }}" class="w-100" style="height:100px" alt="お気に入り">
                        <h5>{{ $sweet->name }}</h5>
                    </a>
                    <p>{{ $sweet->introduction }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-12 mt-3 p-5">
            <h2>カテゴリー一覧</h2>
            <div class="row justify-content-between">
                @foreach($categorys as $category)
                <div class="col-md-4 mt-1 mb-1">
                    <a href="javascript:document.getElementById('a-post{{ $category->id }}').submit()" class="h5">-{{ $category->name }}</a>
                    <form action="{{ route('search') }}" method="post" id="a-post{{ $category->id }}">
                    @csrf
                        <input type="hidden" name="category" value="{{ $category->id }}">
                        <input type="hidden" name="category_name" value="{{ $category->name }}">
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
