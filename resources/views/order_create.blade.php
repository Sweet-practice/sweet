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
                    </div>
                </div>
                <?php
                    $sum += $total;
                ?>
            @endforeach
            <p>小計　¥{{ $sum }}</p>
            <p>送料　¥220</p>
            <p style="font-size:30px">合計　¥{{ $sum+220 }}</p>
            <form action="{{ route('orders.store') }}" method="post" class="mt-2">
            @csrf
                <input type="hidden" name="postage" value="220">
                <input type="hidden" name="total_price" value="{{ $sum+220 }}">
                <button type="submit" class="btn btn-primary">購入内容を確定する</button>
            </form>
        </div>
    </div>
</div>
@endsection
