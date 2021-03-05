@extends('layouts.app_shop')
@section('content')

<div class="container">
	<div class="row">
		<h2 class="offset-5 col-3">カテゴリー一覧</h2>
	  <a href="{{ route('categories.create') }}" class="offset-2 col-2 btn btn-primary">カテゴリー追加</a>
	</div>
	<div class="row">
		@foreach($categories as $category)
		    <a href="" class="offset-4 col-4 btn btn-primary mb-3">{{ $category->name }}</a>
		@endforeach
	</div>
</div>

@endsection