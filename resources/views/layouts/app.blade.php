<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>〇〇お菓子店</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <style>.navbar{background-color: #FF9999;}
            .loved i {color: red !important;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/sweets') }}">
                    〇〇お菓子店
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('マイページ') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.order.index') }}">{{ __('購入履歴') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('carts.index') }}">{{ __('カート') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.rooms.index') }}">{{ __('お問い合わせ') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('courpon.index') }}">{{ __('クーポン一覧') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('notifications.index') }}">{{ __('通知') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('edit') }}">
                                        {{ __('登録内容編集') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @if(!empty($shop))
      <footer class="footer">
        <div id="map" class="row col-8 offset-2" style="height: 500px;">
          <input type="hidden" class="lat" value="{{$shop['lat']}}">
          <input type="hidden" class="lng" value="{{$shop['lng']}}">
        </div>

        <script>
          // googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
          function googlemap() {
            lat = $('.lat').val();
            lng = $('.lng').val();
            // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
            map = document.getElementById("map");
            // 東京タワーの緯度は35.6585769,経度は139.7454506と事前に調べておいた
            let position = new google.maps.LatLng(lat,lng);
            // オプションを設定
            opt = {
              zoom: 13, //地図の縮尺を指定
              center: position, //センターを東京タワーに指定
            };
            // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
            mapObj = new google.maps.Map(map, opt);
            // マーカーピン
            marker = new google.maps.Marker({
            // ピンを差す位置を決めます。
              position: position,
              // ピンを差すマップを決めます。
              map: mapObj,
              // ホバーしたときに「tokyotower」と表示されるようにします。
              title: '皇居',
            });
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('app.g_map')}}&callback=googlemap" async defer></script>
        </script>
      </footer>
    @endif
</body>
</html>
