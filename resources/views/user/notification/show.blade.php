@extends('layouts.app')

@section('content')

<div class="container">
	<h3 class="my-5">{{ $notification->title }}</h3>
	<h3 class="my-5">{{ $notification->content }}</h3>
	@if(!is_null($notification->courpon_id))
	  <a href="{{ route('courpon.show', ['courpon' => $notification->courpon_id]) }}" class="offset-4 col-4 btn btn-primary mb-3">{{ $notification->title }}</a>
	@elseif($notification->message_id)
	  <a href="{{ route('user.rooms.index')}}" class="offset-4 col-4 btn btn-primary mb-3">{{ $notification->title }}</a>
	@elseif($notification->order_id)
	  <a href="{{ route('orders.show', ['order' => $notification->order_id]) }}" class="offset-4 col-4 btn btn-primary mb-3">{{ $notification->title }}</a>
	@elseif($notification->sweet_id)
	  <a href="{{ route('show', ['sweet' => $notification->sweet_id]) }}" class="offset-4 col-4 btn btn-primary mb-3">{{ $notification->title }}</a>
	@endif
</div>


@endsection