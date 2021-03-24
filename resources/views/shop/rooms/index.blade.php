<head>
  <link rel="stylesheet" href="{{ asset('css/room/show.css') }}">
</head>
@extends('layouts.app_shop')

@section('content')

<div class="container">
  <div class="member">
    <h3 style="text-align: center;">お問い合わせ一覧</h3>
  </div>
  <div class="row">
    @foreach($chats as $chat)
      <a href="{{ route('rooms.show', ['room' => $chat->user_id]) }}" class="offset-2 col-8 mb-3 btn btn-primary">
      	{{ $chat->user->name }}
      	{{ App\Room::unreadCount($chat->user->id) }}
      </a>
    @endforeach
  </div>
</div>

@endsection
