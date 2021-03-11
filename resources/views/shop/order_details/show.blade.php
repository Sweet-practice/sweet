<head>
	<link rel="stylesheet" href="{{ asset('css/shop/order_detail/edit.css') }}">
</head>
@extends('layouts.app_shop')

@section('content')

<div class="container">
	<h3 class="my-5">{{ $user->name }}さんのご注文履歴</h3>

  @foreach($orders as $order)
    <a href="{{ route('order_details.edit', ['order_detail' => $order->id]) }}">
			<table class="table">
				<tr>
					<td>ご注文状況：{{ $order->status }}</td>
				</tr>
				<tr>
					<th>ご注文日：{{ $order->created_at }}<p>合計金額：{{ $order->total_price }}</p></th>
				</tr>
			</table>
		</a>
	@endforeach
</div>


@endsection