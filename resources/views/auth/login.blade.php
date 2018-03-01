@extends('layouts.app')

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
                <a role="presentation" class="active" href="#register" aria-controls="register" data-toggle="tab">注册</a>
                <a role="presentation" href="#login" aria-controls="login" data-toggle="tab">登录</a>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="register">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                    <div class="group-inputs">
                        <input required="" type="text" name="fullname" aria-label="姓名" placeholder="昵称">
                        <input required="" type="text" name="phone" aria-label="手机号" placeholder="手机号">
                        <input required="" type="text" name="password" aria-label="密码" placeholder="密码不少于六位">
                    </div>
                    <button class="sign-button submit" type="submit">注册畅言</button>
                    <p class="agreement-tip">点击「注册」按钮，即代表你同意<a href="/terms" target="_blank">《畅言协议》</a></p>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane active" id="login">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                    <div class="group-inputs">
                        <input type="text" name="account" aria-label="手机号" placeholder="手机号" required="">
                        <input type="text" name="password" aria-label="密码" placeholder="密码" required="">
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
