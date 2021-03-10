@extends('layouts.app_shop')
@section('content')

<div class="container">
	<div class="row">
		<h3 class="col-2 offset-5">{{ $user->name }} さん</h3><p>{{\App\Enums\PublishState::getDescription($user->delete_flug)}}</p>
		<a href="{{ route('rooms.show', ['room' => $user->id]) }}" class="btn btn-primary"><p>{{ $user->name }} さんとのチャット</p></a>
		<a href="{{ route('orders.show', ['order' => $user->id]) }}" class="btn btn-primary ml-3">購入履歴</a>
		<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
      @method('put')
		  @csrf
		  <input type="hidden" name="user_id" value="$user->id">
		  <button type="submit" class="btn btn-primary row offset-4 col-4">強制退会</button>
		</form>
	</div>
</div>
@endsection