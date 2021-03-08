@extends('layouts.app_shop')
@section('content')

<div class="container">
	<div class="row">
		<h3 class="col-2 offset-5">{{ $user->name }} さん</h3>
		<a href="{{ route('rooms.show', ['room' => $user->id]) }}" class="btn btn-primary"><p>{{ $user->name }} さんとのチャット</p></a>
		<a href="{{ route('orders.show', ['order' => $user->id]) }}" class="btn btn-primary ml-3">購入履歴</a>
	</div>
</div>
@endsection