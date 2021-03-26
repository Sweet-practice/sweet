@extends('layouts.app_shop')

@section('content')

<div class="container">
	<h3 class="my-5">{{ $courpon->name }}</h3>
	@if(isset($courpon->price))
	  <h3 class="my-5">{{ $courpon->price }}円引き</h3>
	@elseif(isset($courpon->parcent))
	  <h3 class="my-5">{{ $courpon->parcent }}％引き</h3>
	@endif
	<h3 class="my-5">{{ $courpon->in_force }}</h3>
	<h3 class="my-5">{{ $courpon->image_path }}</h3>
</div>


@endsection