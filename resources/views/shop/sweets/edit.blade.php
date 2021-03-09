@extends('layouts.app_shop')
@section('content')
<div class="container">
	<form action="{{ route('sweets.update', ['sweet' => $sweet->id]) }}" enctype='multipart/form-data' method="post">
    @method('put')
		@csrf
      <input type="hidden" name="id" value="{{ $sweet->id }}">
      <input type="text" name="name" class="row offset-4 col-4 mb-5" placeholder="お菓子名" value="{{ $sweet->name }}">
      <select class="row offset-4 col-4 mb-5" name="category_id">
      	@foreach($categories as $category)
          @if($category->id === $sweet->category_id)
      	    <option value="{{ $category->id }}">{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
      	@endforeach
      </select>
      <input type="text" name="stock" class="row offset-4 col-4 mb-5" placeholder="個数" value="{{ $sweet->stock }}">
      <input type="text" name="introduction" placeholder="商品説明" class="row offset-4 col-4 mb-5" value="{{ $sweet->introduction }}">
      <input type="text" name="price" placeholder="価格" class="row offset-4 col-4 mb-5" value="{{ $sweet->price }}">
      <input type="text" name="allergy" placeholder="アレルギー" class="row offset-4 col-4 mb-5" value="{{ $sweet->allergy }}">
      <input type="file" class="form-control row offset-4 col-4 mb-5" name="file">
      <img src="{{ $sweet->path }}" class="mb-3" style="width: 30%; margin: 0 auto; display: block;">

        @foreach($sweet->images as $sub_image)
          <input type="file" class="form-control row offset-4 col-4 mb-5" name="sub_image[]" value="{{ $sub_image->url }}">
          <img src="{{ $sub_image->url }}" class="mb-3" style="width: 30%; margin: 0 auto; display: block;">
        @endforeach
        @for($i = 5 - (count($sweet->images)); $i >= 1; $i--)
          <input type="file" class="form-control row offset-4 col-4 mb-5" name="sub_image[]">
        @endfor
      <button type="submit" class="btn btn-primary row offset-4 col-4">編集する</button>
	</form>
</div>

@endsection