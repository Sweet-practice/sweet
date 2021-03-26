@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-2">
			<h3 class="my-5">{{ $courpon->name }}</h3>
			@if(isset($courpon->price))
			  <h3 class="my-5">{{ $courpon->price }}円引き</h3>
			@elseif(isset($courpon->parcent))
			  <h3 class="my-5">{{ $courpon->parcent }}％引き</h3>
			@endif
			<h3 class="my-5">{{ $courpon->in_force }}</h3>
		</div>
		<img src="{{ $courpon->image_path }}" class="offset-2 col-8">
	</div>

  @if(is_null($get_courpon))
	  <form class="getCourpon">
	    <input type="hidden" name="courpon_id" id="courpon_id" value="{{ $courpon->id }}">
	    <button type="button" class="col-3 btn btn-primary" id="get">このクーポンを取得</button>
	  </form>
	@elseif(!is_null($get_courpon))
	  <h3>このクーポンは取得済みです。</h3>
	@endif
</div>
<script type="module" src="{{mix('/js/courpon.js')}}"></script>


@endsection