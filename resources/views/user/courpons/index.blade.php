@extends('layouts.app')
@section('content')
<div class="container">
  <h3 style="text-align: center;">クーポン一覧</h3>
  @foreach($courpons as $courpon)
    <a href="{{ route('courpon.show', ['courpon' => $courpon->id]) }}" class="offset-2 col-8 mb-3 mt-3 btn btn-primary">
      {{ $courpon->category_id }}
      @if(!is_null($courpon->price))
        {{ $courpon->price }}円引き
      @elseif($courpon->parcent)
        {{ $courpon->parcent }}％引き
      @endif
      {{ $courpon->name }}
      <img src="{{ $courpon->image_path }}" style="width: 50%;">
      有効期限：{{ $courpon->in_force }}
      @foreach(Auth::user()->getcourpons as $getcourpon)
        @if($getcourpon->courpon_id == $courpon->id)
          <p>このクーポンは取得済みです。</p>
        @endif
      @endforeach
    </a>
  @endforeach
</div>

@endsection