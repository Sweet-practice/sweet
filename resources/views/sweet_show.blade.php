@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>{{ $sweet->name }}</h1>
        </div>

        <div class="col-md-12 mt-3 p-5">
            @if(Auth::user())
            @foreach($favolite as $favo)
				@if($like_model->like_exist(Auth::user()->id,$sweet->id))
					<p class="favorite-marke text-right">
						<a href="" class="js-like-toggle loved" style="color:gray;" data-sweetid="{{ $sweet->id }}"><i class="fas fa-heart fa-2x"></i></a>
						<span class="likesCount" style="font-size:20px;">{{$favo->favolits_count}}</span>
					</p>
				@else
					<p class="favorite-marke text-right">
						<a href="" class="js-like-toggle" data-sweetid="{{ $sweet->id }}"><i class="fas fa-heart fa-2x" style="color:gray;"></i></a>
						<span class="likesCount" style="font-size:20px;">{{$favo->favolits_count}}</span>
					</p>
				@endif​
            @endforeach
			@endif​
            <div class="row">
                <img src="{{ $sweet->path }}" class="mx-auto" alt="お菓子画像">
            </div>
            <table class="table mt-5 mx-auto" style="width:80%">
                <tr>
                    <td class="pl-5">商品名</td>
                    <td style="width:50%">{{ $sweet->name }}</td>
                </tr>
                <tr>
                    <td class="pl-5">カテゴリー</td>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <td class="pl-5">商品金額(税込)</td>
                    <td>{{ $sweet->price }}円</td>
                </tr>
                <tr>
                    <td class="pl-5">在庫</td>
                    <td>@if($sweet->status == 'InStock')
                        在庫あり
                        @elseif($sweet->status == 'LowInventory')
                        在庫(小)
                        @else
                        <span style="color:red">在庫なし</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="pl-5">アレルギー</td>
                    <td>@if(empty($sweet->allergy))
                        なし
                        @else
                        {{ $sweet->allergy }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="pl-5">商品説明</td>
                    <td>{{ $sweet->introduction }}</td>
                </tr>
            </table>
            <form action="{{ route('carts.create') }}" method="post" id="cart" class="mt-5 text-right">
            @csrf
                @if($sweet->status == 'OutOfStock')
                    <span style="color:red;">売り切れ中です。<br>次の入荷をお待ちください</span>
                @else
                    <p>＊在庫以上は選択できません</p>
                    <input type="number" name="amout" value="1" min="1" max="{{ $sweet->stock }}" style="width:60px">
                    @if(Auth::user())
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif
                    <input type="hidden" name="sweet_id" value="{{ $sweet->id }}">
                    <button type="submit" class="btn btn-primary">カートに入れる</button>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
