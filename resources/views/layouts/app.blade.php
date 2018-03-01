<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="left_blank"></div>
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    畅言
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    首页
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    发现
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    话题
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <div class="search_outside">
                        <input id="search" type="text" name="search" placeholder="感兴趣的东东">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </ul>
                @if (Auth::check())<button style="margin: 8px 15px;" class="ask_question">提问</button>@endif
                <div class="right_blank"></div>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <div style="margin: 8px 15px;">
                        <a href="{{ route('login') }}"><button style="background-color: #fff;color: #0084ff;margin-right: 15px;" class="ask_question">登录</button></a>
                            <a href="{{ route('register') }}"><button style="width: 90px" class="ask_question">加入畅言</button></a>
                    </div>
                    <!--
                    <li><a href="">图标1</a></li>
                    <li><a href="">图标2</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            aaa<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="">
                                    Logout
                                </a>

                                <form id="logout-form" action="" method="POST" style="display: none;">

                                </form>
                            </li>
                        </ul>
                    </li> -->

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
<!-- Scripts -->

</body>
</html>
