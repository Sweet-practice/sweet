@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div>
                    <h2>{{ Auth::user()->name }} さんのマイページ</h2>
                    @if(isset($point))
                    <p>現在の所持ポイント　{{ $point->value }}　pt</p>
                    @endif
                </div>
                <div class="ml-auto">
                    <form action="{{ route('search') }}" method="post" id="search">
                    @csrf
                        <input type="text" name="name" placeholder="商品名検索">
                        <button type="submit">検索</button>
                    </form>
                </div>
            </div>
            <div class="col-md-11 mt-3 mx-auto">
                <h3>お気に入り商品</h3>
                <div class="d-flex justify-content-between flex-wrap">
                    @if(count($sweets) == 0)
                        <div class="mt-5 w-100">
                        <h4 class="text-center">お気に入りの商品は登録されていません。</h4>
                        </div>
                    @endif
                    @foreach($sweets as $sweet)
                    <div class="m-1 w-25">
                        @if($like_model->like_exist(Auth::user()->id,$sweet->id))
                            <p class="favorite-marke text-right">
                                <a href="" class="js-like-toggle loved" style="color:gray;" data-sweetid="{{ $sweet->id }}"><i class="fas fa-heart"></i></a>
                                <span class="likesCount">{{ $sweet->favolits_count }}</span>
                            </p>
                            <a href="{{ route('show', ['sweet' => $sweet->id]) }}">
                                <img src="{{ $sweet->path }}" class="w-100" style="height:200px" alt="お気に入り">
                                <h5>{{ $sweet->name }}</h5>
                            </a>
                            <p>{{ $sweet->introduction }}</p>
                        @endif​
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-11 mt-3 mx-auto">
                <h3>おすすめ商品</h3>
                <div class="d-flex justify-content-between flex-wrap">
                    @foreach($randoms as $random)
                    <div class="m-1" style="width:150px">
                        <a href="{{ route('show', ['sweet' => $random->id]) }}">
                            <img src="{{ $random->path }}" class="w-100" style="height:100px" alt="お気に入り">
                            <h5>{{ $random->name }}</h5>
                        </a>
                        <p>{{ $random->introduction }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
