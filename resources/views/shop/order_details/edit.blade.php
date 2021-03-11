<head>
	<link rel="stylesheet" href="{{ asset('css/shop/order_detail/show.css') }}">
</head>
@extends('layouts.app_shop')

@section('content')

<div class="container">
	<h3 class="my-5">{{ $order_details->user->name }}さんのご注文</h3>
	<h3>{{\App\Enums\OrderStatus::getStatus($order_details->status)}}</h3>
	<h3 class="top pt-4">ご注文表</h3>
	<table class="table pb-5">
		@foreach($order_details->order_details as $order_detail)
			<tr class="row offset-4 col-4 justify-content-center">
				<th class="mr-3">{{ $order_detail->sweet_name }}</th><th>{{ $order_detail->amout }} 個</th><th class="mr-3">{{ $order_detail->price }} 円</th>
			</tr>
		@endforeach

    <tr class="row offset-4 col-4 justify-content-center">
		  <th class="mr-3">送料：{{ $order_details->postage }}円</th>
		</tr>
    <tr class="row offset-4 col-4 justify-content-center">
		  <th class="mr-3">合計金額：{{ $order_details->total_price }}円</th>
		</tr>
	</table>

  <form action="{{ route('orders.update', ['order' => $order_details->id])}}" method="post" accept-charset="utf-8">
    @method('put')
		@csrf
		<input type="hidden" name="order_id" value="{{ $order_details->id }}">
		<select class="row offset-4 col-4 mb-5" name="status">
		  @foreach($status as $stu)
			  <option value="{{ $stu }}">{{\App\Enums\OrderStatus::getStatus($stu)}}</option>
			@endforeach
		</select>
		<button type="submit" class="btn btn-primary row offset-4 col-4">ステータスを変更</button>
  </form>
</div>


@endsection