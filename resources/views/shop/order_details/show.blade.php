@extends('layouts.app_shop')

@section('content')

<div class="container">
	@foreach($order_details->order_details as $order_detail)
	  <div class="row">
	  	{{ $order_detail->sweet_name }}
	  </div>
	@endforeach
</div>


@endsection