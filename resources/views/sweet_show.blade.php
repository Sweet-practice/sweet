<head>
  <link rel="stylesheet" href="{{ asset('/css/user/sweet/show.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>{{ $sweet->name }}</h1>
        </div>

      @if($avg == 0.0)
        <h3>まだ評価されていません</h3>
      @elseif($avg != 0.0)
        @for($i = floor($avg); $i >= 1; $i--)
          <span style="color:#ffd700; font-size: 2rem;"><i class="fas fa-star"></i></span>
        @endfor
        @if(substr(strrchr($avg, '.'), 1) >= 5)
          <span style="color:#ffd700; font-size: 2rem;"><i class="fas fa-star-half-alt"></i></span>
        @endif
        <h3>{{ $avg }}</h3>
      @endif

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
              @if($sweet->path)
                <img src="{{ $sweet->path }}" class="mx-auto" alt="お気に入り">
              @else
                画像はありません
              @endif
            </div>
            <p class="text-right">ポイント数　{{ $sweet->point }}pt</p>
            <table class="table mt-4 mx-auto" style="width:80%">
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

    @if(isset(Auth::user()->id))
      <form action="#" method="post" class="mb-5">
        <h2 style="text-align: center;" class="my-5">コメントする</h2>
        <input type="hidden" class="okasi" value="{{ $sweet->id }}">
        <input type="hidden" class="userId" value="{{ Auth::user()->id }}">
        <input type="text" class="title row offset-4 col-4 mb-5">
        <textarea class="body row offset-3 col-6 mb-5" style="height: 150px;"></textarea>
        <div id="range-group" class="offset-4 col-4 mb-5">
         <input type="range" id="input-range" class="star" min="1" max="5" value="" />
        </div>
        <button type="button" class="comment_btn btn btn-info row offset-5 col-2">コメントをする</button>
      </form>
    @elseif(!isset(Auth::user()->id))
      <h3 style="text-align: center;" class="mt-5">コメントをするにはユーザー登録が必要です。</h3>
    @endif

</div>
<script type="module" src="{{mix('/js/star.js')}}"></script>
@endsection

