@extends('layouts.app_shop')

@section('content')
<div class="container">
	<div class="row">
		<a href="{{ route('orders.index', 'Untreated') }}" class="offset-1 col-1 btn btn-primary">未処理</a>
		<a href="{{ route('orders.index', 'undispatched') }}" class="col-1 offset-2 btn btn-primary">未発送</a>
		<a href="{{ route('orders.index', 'shipping') }}" class="col-1 offset-2 btn btn-primary">発送中</a>
		<a href="{{ route('orders.index', 'sent') }}" class="col-1 offset-2 btn btn-primary">発送済み</a>
	</div>
	<div class="row">
		<h3><?php echo $i; ?></h3>
	</div>
	@foreach($orders as $order)
	  <div class="row">
	  	<a href="{{ route('order_details.show', ['order_detail' => $order->id]) }}" class="offset-2 col-8 mb-3 btn btn-primary">{{ $order->user->name }}</a>
	  </div>
	@endforeach
</div>
@endsection