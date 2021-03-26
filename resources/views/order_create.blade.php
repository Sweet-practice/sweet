@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>購入手続き</h1>
        </div>

        <div class="col-md-12 mt-3 p-5">
            <?php
                $sum = 0;
            ?>
            @foreach ($carts as $cart)
                <div class="m-3 row border-bottom pb-1">
                    <img src="{{ $cart->sweet->path }}" class="w-25" alt="画像">
                    <div class="w-50 pl-5">
                        <p style="font-size:20px">{{ $cart->sweet->name }}</p>
                        <p>購入数　{{ $cart->amout }}個</p>
                        <p>小計　¥{{ $total = $cart->amout*$cart->sweet->price }}</p>
                        @if($cart->sweet->stock - $cart->amout < 0)
                            <span style="color:red;text-size:18px">{{ $stock }}</span>
                        @endif
                    </div>
                </div>
                <?php
                    $sum += $total;
                ?>
            @endforeach
            <p>小計　¥{{ $sum }}</p>
            <p>送料　¥220</p>
            @if($discount != $sum)
              <p style="font-size:30px">合計　¥{{ $discount+220 }}</p>  <p>クーポン使用後</p>
            @else
              <p style="font-size:30px">合計　¥{{ $discount+220 }}</p>
            @endif

            @if(isset($stock))
                <p style="color:red;">在庫が不足している商品があるためご購入いただけません。</p>
                <p>次の入荷をお待ちください。</p>
            @else
            <form action="{{ route('orders.store') }}" method="post" class="mt-2">
            @csrf
                <input type="hidden" name="postage" value="220">
                <input type="hidden" name="total_price" value="{{ $discount+220 }}">
                <input type="hidden" name="courpon" id="courpon" value="{{ $courpon }}">
                <button type="submit" class="btn btn-primary">購入内容を確定する</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection