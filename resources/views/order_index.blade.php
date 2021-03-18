@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>購入履歴</h1>
        </div>

        <div class="col-md-12 mt-3 p-5">
            @if(count($orders) == 0)
                <div class="w-100 mt-3">
                    <h3 class="text-center">購入履歴はありません。</h3>
                </div>
            @else
            @foreach ($orders as $order)
                <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="">
                    <p style="font-size:20px; margin-bottom:0;">{{ $order->id }}</p>
                </a>
                <div class="m-1 row border-bottom pb-1">
                    <div class="w-25">
                    @foreach ($order->order_details as $order_d)
                        <div class="row ml-3">
                        <p style="font-size:18px">{{ $order_d->sweet_name }}</p>
                        <p>　{{ $order_d->amout }}個</p>
                        </div>
                    @endforeach
                    </div>
                    <div class="w-50 pl-5">
                        <p>{{\App\Enums\OrderStatus::getStatus($order->status)}}</p>
                        <p>合計　¥{{ $order->total_price }}　(送料込み)</p>
                    </div>
                    <p class="text-right" style="margin-bottom:0;">{{ $order->created_at->format('Y/m/d') }}</p>
                </div>
            @endforeach
            <p>送料　¥220</p>
            @endif
        </div>
    </div>
</div>
@endsection
