<head>
  <link rel="stylesheet" href="{{ asset('css/room/show.css') }}">
</head>
@extends('layouts.app_shop')

@section('content')

<div class="talk">
  @foreach($messages->messages as $message)
    @if(!is_null($message->shop_id))
      <div class="row offset-8 talk_right">
        <p>{{ $message->content }}</p>
      </div>
    @elseif(!is_null($message->user_id))
      <div class="row talk_left">
        <p>{{ $message->content }}</p>
      </div>
    @endif
  @endforeach
</div>

    <form>
      <input type="hidden" name="user_id" id="user_id" value="{{$user}}">
      <input type="hidden" name="room_id" id="room_id" value="{{$messages->id}}">
      <textarea name="content" id="content" style="width:100%"></textarea>
      <button type="button" id="btn_send">送信</button>
    </form>


</div>
<script type="module" src="{{mix('/js/chat.js')}}"></script>
@endsection
