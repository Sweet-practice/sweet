@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>購入履歴</h1>
        </div>

        <div class="col-md-12 mt-3 p-5">
            @foreach ($orders as $order)
                <div class="m-3 row border-bottom pb-1">
                    <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="">
                        <p style="font-size:20px">{{ $order->id }}</p>
                    </a>
                    <div class="w-25">
                    @foreach ($order->order_detail as $order_d)
                        <div class="row ml-3">
                        <p style="font-size:18px">{{ $order_d->sweet_name }}</p>
                        <p>　{{ $order_d->amout }}個</p>
                        </div>
                    @endforeach
                    </div>
                    <div class="w-50 pl-5">
                        <p>{{ $order->status }}</p>
                        <p>¥{{ $order->total_price }}</p>
                    </div>
                </div>
            @endforeach
            <p>送料　¥220</p>
        </div>
    </div>
</div>
@endsection
