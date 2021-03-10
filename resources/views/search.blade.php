@extends('layouts.app')

@section('content')

<div class="container mt-3">
	@if(isset($name) && isset($id))
		<h3>{{ $name }} の一覧</h3>
		<h4><?php echo count($search) ?> 件</h4>
	@elseif(isset($name))
		<h3>{{ $name }} の検索結果</h3>
		<h4><?php echo count($search) ?> 件</h4>
	@else
	  <h3>全件検索結果</h3>
	  <h4><?php echo count($search) ?> 件</h4>
	@endif

	<div class="row mt-4">
		@if(count($search) == 0)
			<div class="w-100 mt-3">
				<h3 class="text-center">検索の結果、該当商品はありません。</h3>
			</div>
		@endif
		@foreach ($search as $sweet)
			<div class="m-3 row">
				<a href="{{ route('show', ['sweet' => $sweet->id]) }}" class="">
					<img src="{{ $sweet->path }}" alt="画像">
					<p class="text-center">{{ $sweet->name }}</p>
				</a>
			</div>
		@endforeach
	</div>

@endsection