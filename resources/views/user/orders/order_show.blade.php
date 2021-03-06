@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>購入履歴詳細</h1>

            <div class="col-md-12 mt-3 p-5">
                <?php
                    $sum = 0;
                ?>
                <h3>{{\App\Enums\OrderStatus::getStatus($order->status)}}</h3>
                @foreach ($order_detail as $order_d)
                    <div class="m-3 row border-bottom pb-1">
                        <img src="{{ $order_d->sweet->path }}" class="w-25" alt="画像">
                          <div class="w-50 pl-5">
                            <p style="font-size:20px">{{ $order_d->sweet_name }}</p>
                            <p>購入数　{{ $order_d->amout }}個</p>
                            <p>計　¥{{ $order_d->price }}</p>
                        </div>
                        <?php
                            $sum += $order_d->price;
                        ?>
                    </div>
                @endforeach
                <p>取得ポイント　{{ $order->total_point }}pt</p>
                <p>合計　¥{{ $sum }}</p>
                <p>送料　¥220</p>
                @if(isset($order->use_point))
                <p class="w-25 border-bottom border-danger">使用ポイント {{ $order->use_point }}pt</p>
                @endif
                <p style="font-size:30px">合計　¥{{ $order->total_price }}</p>
            </div>
            <a href="{{ route('user.order.index') }}" class="btn btn-primary">一覧へ戻る</a>
        </div>
    </div>
</div>
@endsection
