@extends('layouts.nothing')

@section('content')
    <div class="container">
        <div class="index-main-body">
            <div class="index-header">
                <h1 class="logo">畅 言</h1>
                <h2 class="subtitle">以你所见  &nbsp;&nbsp;&nbsp; 畅所欲言</h2>
            </div>
            <div>

                <!-- Nav tabs -->
                <div class="nav nav-tabs" role="tablist">
                    <a role="presentation" class="active"  href="{{ url('/register') }}" aria-controls="register" data-toggle="tab">注册</a>
                    <a role="presentation" href="{{ url('/login') }}" aria-controls="login" data-toggle="tab">登录</a>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="register">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <div class="group-inputs">
                                <input required="" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" aria-label="昵称" placeholder="昵称">
                                @if ($errors->has('name'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <input required="" type="text" class="form-control" name="phone" value="{{ old('phone') }}" aria-label="手机号" placeholder="手机号">
                                @if ($errors->has('phone'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                <input required="" type="text" class="form-control" name="email" value="{{ old('email') }}" aria-label="邮箱" placeholder="邮箱">
                                @if ($errors->has('email'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input required="" type="password" class="form-control" name="password" aria-label="密码" placeholder="密码不少于六位">
                                @if ($errors->has('password'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="sign-button submit" type="submit">注册畅言</button>
                            <p class="agreement-tip">点击「注册」按钮，即代表你同意<a href="/terms" target="_blank">《畅言协议》</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
@endsection
