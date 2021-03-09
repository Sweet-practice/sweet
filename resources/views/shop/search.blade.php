<head>
	<link rel="stylesheet" href="{{ asset('css/shop/home/search.css') }}">
</head>
@extends('layouts.app_shop')

@section('content')

<div class="container mt-5">
	@if(isset($name))
		<h3>{{ $value }} で {{ $name }} の検索結果</h3><br>
		<h3><?php echo count($search) ?> 件</h3>
	@else(empty($name))
	  <h3>{{ $value }} の全件検索結果</h3><br>
	  <h3><?php echo count($search) ?> 件</h3>
	@endif

	<div class="row">
		@if($value === 'ユーザー')
			@foreach ($search as $user)
			  <div class="shop mx-3 mb-5">
			    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-primary"><p>{{ $user->name }}</p></a>
			  </div>
			@endforeach
		@endif

		@if($value === 'お菓子')
			@foreach ($search as $sweet)
			  <div class="shop mx-3 mb-5">
			  	<img src="{{ $sweet->path }}">
			      <a href="{{ route('sweets.show', ['sweet' => $sweet->id]) }}" class="btn btn-primary"><p>{{ $sweet->name }}</p></a>
			  </div>
			@endforeach
		@endif
	</div>

@endsection