@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>カート一覧</h1>
        </div>

        <div class="col-md-12 mt-3 p-5">
        @if(count($carts) == 0)
            <div class="w-100 mt-3">
				<h3 class="text-center">カートに商品はありません。</h3>
			</div>
        @else
            <?php
                $sum = 0;
            ?>
            @foreach ($carts as $cart)
                <div class="m-3 row border-bottom pb-1">
                    <img src="{{ $cart->sweet->path }}" class="w-25" alt="画像">
                    <div class="w-50 pl-5">
                        <a href="{{ route('show', ['sweet' => $cart->sweet->id]) }}" class="">
                            <p style="font-size:20px">{{ $cart->sweet->name }}</p></a>
                        <p>購入数　{{ $cart->amout }}個</p>
                        <p>小計　¥{{ $total = $cart->amout*$cart->sweet->price }}</p>
                        @if($cart->sweet->stock - $cart->amout < 0)
                            <span style="color:red;">{{ $stock }}</span>
                        @endif
                    </div>
                    <form method="post" action="{{ route('carts.destroy', ['id' => $cart->id]) }}" class="mt-auto">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-primary">削除</button>
                    </form>
                </div>
                <?php
                    $sum += $total;
                ?>
            @endforeach

            <form action="{{ route('carts.update', ['cart' => Auth::user()->id]) }}" method="post">
              @method('put')
              @csrf
              <input type="hidden" name="total" value="{{ $sum }}">
              <select class="row offset-4 col-4 mb-5" name="courpon">
                <option value="0">クーポンを使用しない</option>
                @foreach($getcourpons as $getcourpon)
                  <option value="{{ $getcourpon->id }}">
                    {{ $getcourpon->name }}
                    @if(!is_null($getcourpon->price))
                      {{ $getcourpon->price }}円引き
                    @elseif(!is_null($getcourpon->parcent))
                      {{ $getcourpon->parcent }}引き
                    @endif
                  </option>
                @endforeach
              </select>
              <button type="submit" class="btn btn-primary">クーポンを使う</button>
            </form>

            @if(isset($discount))
              <p style="font-size:30px">合計　¥{{ $discount }}</p>
            @else
              <p style="font-size:30px">合計　¥{{ $sum }}</p>
            @endif
            @if(!empty($stock))
                <p style="color:red;">在庫が不足している商品があるためご購入いただけません。</p>
                <p>次の入荷をお待ちください。</p>
            @else
              <form action="{{ route('orders.create') }}">
                @csrf
                @if(isset($discount))
                  <input type="hidden" name="total" value="{{ $discount }}">
                  <input type="hidden" name="courpon" value="{{ $courpon }}">
                @else
                  <input type="hidden" name="total" value="{{ $sum }}">
                @endif
                <button type="submit" class="text-right btn btn-primary">購入手続きへ進む</button>
              </form>
            @endif
        @endif
        </div>
    </div>
</div>
@endsection
