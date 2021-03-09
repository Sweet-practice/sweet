@extends('layouts.app')

@section('content')

<div class="container mt-3">
	@if(isset($name))
		<h3>{{ $name }} の検索結果</h3>
		<h4><?php echo count($search) ?> 件</h4>
	@else(empty($name))
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
			<div class="m-3 d-flex justify-content-between flex-wrap">
				<a href="{{ route('show', ['sweet' => $sweet->id]) }}" class="">
					<img src="image/sweet1.jpeg" alt="画像">
					<p class="text-center">{{ $sweet->name }}</p>
				</a>
			</div>
		@endforeach
	</div>

@endsection