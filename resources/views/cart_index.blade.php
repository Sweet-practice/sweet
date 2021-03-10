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
                    </div>
                    <form method="post" action="{{ route('carts.destroy', ['id' => $cart->id]) }}" class="mt-auto">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-primary">削除</button>
                    </form>
                    <!-- <a href="{{ route('carts.destroy',['id' => $cart->id]) }}" class="mt-auto btn btn-primary">削除</a> -->
                </div>
                <?php
                    $sum += $total;
                ?>
            @endforeach
            <p style="font-size:30px">合計　¥{{ $sum }}</p>
            <a href="{{ route('orders.create') }}" class="text-right btn btn-primary">購入手続きへ進む</a>
        @endif
        </div>
    </div>
</div>
@endsection
