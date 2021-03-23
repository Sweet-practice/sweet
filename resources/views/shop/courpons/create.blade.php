@extends('layouts.app_shop')
@section('content')
<div class="container">
	<form action="{{ route('courpons.store')}}" enctype='multipart/form-data' method="post">
		@csrf
      <input type="text" name="name" class="row offset-4 col-4 mb-5" placeholder="クーポン名">
      <select class="row offset-4 col-4 mb-5" name="category_id">
        <option value="">指定なし</option>
      	@foreach($categories as $category)
      	  <option value="{{ $category->id }}">{{ $category->name }}</option>
      	@endforeach
      </select>
      <select class="row offset-4 col-4 mb-5" name="method">
        <option value="parcent">％引き</option>
        <option value="price">円引き</option>
      </select>
      <input type="text" name="content" class="row offset-4 col-4 mb-5" placeholder="クーポン内容">
      <input type="date" name="in_force" placeholder="有効期限" class="row offset-4 col-4 mb-5">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="file">
	    <button type="submit" class="btn btn-primary row offset-4 col-4">クーポン追加</button>
	</form>
</div>

@endsection