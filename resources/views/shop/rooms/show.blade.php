@extends('layouts.app_shop')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>
    <ul id="room">
        @foreach($messages->messages as $message)
          <li>{{ $message->content }}</li>
        @endforeach
    </ul>

    <form>
      <input type="hidden" name="user_id" id="user_id" value="{{$user}}">
      <input type="hidden" name="room_id" id="room_id" value="{{$messages->id}}">
      <textarea name="content" id="content" style="width:100%"></textarea>
      <button type="button" id="btn_send">送信</button>
    </form>


</div>
<script type="module" src="{{mix('/js/chat.js')}}"></script>
@endsection
