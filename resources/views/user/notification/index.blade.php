@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<h2 style="text-align: center;">通知一覧</h2>
	</div>
	<div class="row">
		@foreach($notifications as $notification)
		  <a href="{{ route('notification.show', ['notification' => $notification->id]) }}" class="offset-4 col-4 btn btn-primary mb-3">{{ $notification->title }}</a>
		@endforeach
	</div>
</div>

@endsection