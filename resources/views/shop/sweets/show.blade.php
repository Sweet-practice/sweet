@extends('layouts.app_shop')

@section('content')
  <h3 class="col-2 offset-5">{{ $sweet->name }}</h3>
  <img src="{{ $sweet->path }}">
  @foreach($sweet->images as $sub_image)
    <img src="{{ $sub_image->url }}">
  @endforeach
@endsection

<script src="{{ mix('js/shop/slide.js') }}"></script>