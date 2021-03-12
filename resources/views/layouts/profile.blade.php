<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--高速読み込み-->
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<!--画面の大きさ調整-->
		
		 <!-- CSRF Token -->
		 <meta name="csrf-token" content="{{ csrf_token() }}">
		 <!--攻撃防御プログラム-->
		 <title>@yield('title')</title>
		 
		 <!-- Scripts -->
		 <script src="{{ secure_asset('js/app.js') }}" defer></script>
		 
		 <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/profile.css') }}" rel="stylesheet">
	</head>
	<body>
		<div id="app">
			{{-- 画面上部に表示するナビゲーションバーです。 --}}
			<nav class="navber navber-expand-md navber-dark navber-laravel">
				<div class="container">
					<a class="navber-brand" href="{{url('/')}}">
						{{ config('/','Laravel')}}
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggle-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>
                                               <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
                <!--ここから-->
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li>
                        	<a class="nav-link" href="{{ route('login')}}">課題用</a>
                        </li>
                        {{--ログインしていたら以下のコマンドでユーザー名とログアウトボタンを出す--}}
                    @else
                        <li class="nav-item dropdown container">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <!--navberDropdownの中身はaに囲まれた文字の中に以下のdropdpwn-menuを格納する-->
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <!--aのdropdown-menuを一つ作るごとに▼の中身が増える-->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                 </form>
                            </div>
                        </li>
                </ul>
                @endguest
                <!--ここまでがログインボタン-->
            </main>
        </div>
    </body>
</html>