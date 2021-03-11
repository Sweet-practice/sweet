@extends('layouts.app_shop')
@section('content')

<div class="container">
	<div class="row">
		<h3 class="col-4">{{ $user->name }} さん</h3><p>{{\App\Enums\PublishState::getDescription($user->delete_flug)}}</p>
		<a href="{{ route('rooms.show', ['room' => $user->id]) }}" class="offset-2 col-1 btn btn-primary"><p>チャット</p></a>
		<a href="{{ route('order_details.show', ['order_detail' => $user->id]) }}" class="col-1 btn btn-primary mx-3">購入履歴</a>
		<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" class="col-2">
      @method('put')
		  @csrf
		  <input type="hidden" name="user_id" value="$user->id">
		  <button type="submit" class="btn btn-primary">強制退会</button>
		</form>
	</div>
</div>
@endsection