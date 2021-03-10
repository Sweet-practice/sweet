@extends('layouts.app_shop')

@section('content')
<div class="container">
	<div class="row">
		<a href="{{ route('orders.index', 'Untreated') }}" class="col-1">未処理</a>
		<a href="{{ route('orders.index', 'undispatched') }}" class="col-1 offset-2">未発送</a>
		<a href="{{ route('orders.index', 'shipping') }}" class="col-1 offset-2">発送中</a>
		<a href="{{ route('orders.index', 'sent') }}" class="col-1 offset-2">発送済み</a>
	</div>
	<div class="row">
		<h3><?php echo $i; ?></h3>
	</div>
	@foreach($orders as $order)
	  <div class="row col-2">
	  	<a href="{{ route('order_details.show', ['order_detail' => $order->id]) }}" class="col-1 offset-2">{{ $order->user->name }}</a>
	  </div>
	@endforeach
</div>
@endsection