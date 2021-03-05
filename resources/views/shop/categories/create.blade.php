@extends('layouts.app_shop')
@section('content')
<div class="container">
	<form action="{{ route('categories.store')}}" method="post">
		@csrf
    <input type="text" name="name" class="row offset-4 col-4 mb-5">
	  <button type="submit" class="btn btn-primary row offset-4 col-4">カテゴリー追加</button>
	</form>
</div>

@endsection