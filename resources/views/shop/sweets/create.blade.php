@extends('layouts.app_shop')
@section('content')
<div class="container">
	<form action="{{ route('sweets.store')}}" method="post">
		@csrf
    <input type="text" name="name" class="row offset-4 col-4 mb-5">
    <select>
    	@foreach($categories as $key => $category)
    	  <option value="{{ $key }}">{{ $category->name }}</option>
    	@endforeach
    </select>
	  <button type="submit" class="btn btn-primary row offset-4 col-4">カテゴリー追加</button>
	</form>
</div>

@endsection