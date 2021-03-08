@extends('layouts.app_shop')
@section('content')
<div class="container">
	<form action="{{ route('sweets.store')}}" enctype='multipart/form-data' method="post">
		@csrf
      <input type="text" name="name" class="row offset-4 col-4 mb-5" placeholder="お菓子名">
      <select class="row offset-4 col-4 mb-5" name="category_id">
      	@foreach($categories as $category)
      	  <option value="{{ $category->id }}">{{ $category->name }}</option>
      	@endforeach
      </select>
      <input type="text" name="stock" class="row offset-4 col-4 mb-5" placeholder="個数">
      <input type="text" name="introduction" placeholder="商品説明" class="row offset-4 col-4 mb-5">
      <input type="text" name="price" placeholder="価格" class="row offset-4 col-4 mb-5">
      <input type="text" name="allergy" placeholder="アレルギー" class="row offset-4 col-4 mb-5">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="file">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="sub_image[]">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="sub_image[]">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="sub_image[]">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="sub_image[]">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="sub_image[]">
	    <button type="submit" class="btn btn-primary row offset-4 col-4">お菓子追加</button>
	</form>
</div>

@endsection