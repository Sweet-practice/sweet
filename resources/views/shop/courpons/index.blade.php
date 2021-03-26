@extends('layouts.app_shop')
@section('content')
<div class="container">
  <div class="row mb-5">
    <h3 class="offset-4 col-2">クーポン一覧</h3>
    <a href="{{ route('courpon.create') }}" class="offset-3 col-3 btn btn-primary">クーポン追加</a>
  </div>
  @foreach($courpons as $courpon)
    <div class="row mb-4">
      <a href="{{ route('courpons.show', ['courpon' => $courpon->id]) }}" class="col-7 btn btn-primary">
        {{ $courpon->category_id }}
        @if(!is_null($courpon->price))
          {{ $courpon->price }}
        @elseif($courpon->parcent)
          {{ $courpon->parcent }}
        @endif
        {{ $courpon->name }}
        {{ $courpon->image_path }}
        {{ $courpon->in_force }}
      </a>

    <form action="{{ route('courpons.destroy', ['courpon' => $courpon->id]) }}" method="post" class="offset-2 col-3">
      @csrf
      @method('delete')
      <input type="submit" name="" value="削除する" class="btn btn-primary">
    </form>

    </div>
  @endforeach
</div>

@endsection