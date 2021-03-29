<head>
	<link rel="stylesheet" href="{{ asset('css/shop/sweet/show.css') }}">
</head>
@extends('layouts.app_shop')

@section('content')
<body>
  <h3 class="col-2 offset-5">{{ $sweet->name }}</h3>
  <a href="{{ route('sweets.edit', ['sweet' => $sweet->id]) }}" class="btn btn-primary"><p>{{ $sweet->name }} を編集</p></a>

  <div id="arrow-left" class="arrow"></div>
  <div id="arrow-right" class="arrow"></div>
  <div id="slider">
    <img src="{{ $sweet->path }}" class="slide slide0">

    @foreach($sweet->images as $key => $sub_image)
      <img src="{{ $sub_image->url }}" class="slide slide{{ $key + 1}}">
    @endforeach
  </div>

  <video controls width="400" class="mt-5">

      <source src="{{ $sweet->video }}">
      Sorry, your browser doesn't support embedded videos.
  </video>

  <script src="{{mix('/js/slide.js')}}"></script>
</body>
@endsection
