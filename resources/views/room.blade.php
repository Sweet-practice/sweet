<head>
  <link rel="stylesheet" href="{{ asset('css/room/show.css') }}">
</head>
@extends('layouts.app')

@section('content')

<div class="talk">
  @foreach($messages->messages as $message)
    @if(!is_null($message->user_id))
      <div class="row text-right">
        <div class="ml-auto mr-2 status">
          <p>{{ $message->status }}</p>
        </div>
        <div class="talk_right" style="max-width:50%;">
          <p class="text-left" style="max-width:75%;">{{ $message->content }}</p>
        </div>
      </div>

    @elseif(!is_null($message->shop_id))
      <div class="row">
        <div class="talk_left" style="max-width:50%;">
          <p class="mt-2" style="max-width:75%;">{{ $message->content }}</p>
        </div>
      </div>
    @endif
  @endforeach
</div>

    <form class="mt-3 w-50 text-center" style="margin:0 auto">
      <input type="hidden" name="user_id" id="user_id" value="{{$user}}">
      <input type="hidden" name="room_id" id="room_id" value="{{$messages->id}}">
      <input type="text" name="content" id="content" style="width:70%">
      <button type="button" class="btn btn-primary" id="usebtn_send">送信</button>
    </form>


</div>
<script type="module" src="{{mix('/js/chat_u.js')}}"></script>
@endsection