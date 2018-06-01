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
                <a role="presentation" class="active" href="{{ url('/register') }}" aria-controls="register" data-toggle="tab">注册</a>
                <a role="presentation"  href="{{ url('/login') }}" aria-controls="login" data-toggle="tab">登录</a>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="login">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                    <div class="group-inputs">
                        <input type="text" class="form-control" name="login" aria-label="手机号" placeholder="手机号或邮箱" required="">
                        <input type="password" class="form-control" name="password" aria-label="密码" placeholder="密码" required="">
                        @if ($errors->has('login'))
                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <button class="sign-button submit" type="submit">登录</button>
                    <div class="signin-misc-wrapper clearfix">
                        <button type="button" class="signin-switch-button">手机验证码登录</button>
                        <a class="unable-login" href="#">无法登录？</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection
