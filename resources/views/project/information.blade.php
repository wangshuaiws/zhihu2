@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="homepage">
            <div class="home-back"></div>
            <img class="avatar" src="{{ asset($user->avatar) }}" alt="头像">
            <div class="personal">
                <span style="font-size: 26px"><b>{{ $user->name }}</b></span>
                <span style="font-size: 18px;margin-left: 10px;">{{ $user->signature }}</span>
                @if(Auth::id() == $user->id)
                <a href="{{ Route('information_edit',$user->name) }}" style="margin-left: 630px"
                   class="btn btn-primary">编辑个人信息</a>@endif
            </div>
        </div>
        <div class="middle-main">
            <div class="middle-nav">
                <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#answer" data-toggle="tab">回答</a></li>
                    <li><a href="#question" data-toggle="tab">提问</a></li>
                    <li><a href="#article" data-toggle="tab">文章</a></li>
                    <li><a href="#collection" data-toggle="tab">收藏</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="panel panel-default tab-pane fade in active" id="answer" style="height: auto;">
                    @foreach($answers as $answer)
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $answer->title }}
                            </h3>
                        </div>
                        <div class="panel-body" id="main-body">
                            {!! $answer->body !!}
                        </div>
                        <button class="btn btn-primary read" onclick="show(this)"
                                style="margin-left: 15px;margin-top: 10px">阅读全文
                        </button>
                        <input type="hidden" value="{{ $answer->id }}">
                    @if(Auth::id() == $user->id)
                        <a href="/answer/{{ $answer->id }}/delete" class="btn btn-danger pull-right"  style="margin-top: 10px;margin-left: 10px;margin-right: 18px">删除 </a>
                        <a href="/answer/{{ $answer->id }}/edit" class="btn btn-default pull-right"  style="margin-top: 10px">修改</a>
                        @endif
                    @endforeach
                </div>
                <div class="panel panel-default tab-pane fade" id="question" style="height: auto">
                    @foreach($questions as $question)
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $question->title }}
                            </h3>
                        </div>
                        <div class="panel-body" id="main-body" style="height: auto">
                            {!! $question->body !!}
                        </div>
                        <input type="hidden" value="{{ $question->id }}">
                    @if(Auth::id() == $user->id)
                        <button class="btn btn-danger pull-right"  style="margin-top: -32px;margin-left: 10px;margin-right: 18px">删除 </button>
                        <a href="" class="btn btn-default pull-right"  style="margin-top: -32px">修改</a>
                        @endif
                    @endforeach
                </div>
                <div class="panel panel-default tab-pane fade" id="article">
                    @foreach($articles as $article)
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $article->title }}
                            </h3>
                        </div>
                        <div class="panel-body" id="main-body">
                            {!! $article->body !!}
                        </div>
                        <button class="btn btn-primary read" onclick="show(this)"
                                style="margin-left: 15px;margin-top: 10px">阅读全文
                        </button>
                        <input type="hidden" value="{{ $article->id }}">
                    @if(Auth::id() == $user->id)
                        <button class="btn btn-danger pull-right"  style="margin-top: 10px;margin-left: 10px;margin-right: 18px">删除 </button>
                        <a href="" class="btn btn-default pull-right"  style="margin-top: 10px">修改</a>
                        @endif
                    @endforeach
                </div>
                <div class="panel panel-default tab-pane fade" id="collection" style="height: auto">
                    @foreach($all as $question)
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{ $question['title'] }}
                            </h3>
                        </div>
                        <div class="panel-body" id="main-body">
                            {!! $question['body'] !!}
                        </div>
                        <button class="btn btn-primary read" onclick="show(this)"
                                style="margin-left: 15px;margin-top: 10px">阅读全文
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="middle-right">
            <a href="" type="button">
                <div class="NumberBoard-itemName">
                    关注者<br>
                    <strong style="font-size: 20px">{{ $user->followers_count }}</strong>
                </div>
            </a>
            <a href="" type="button">
                <div class="NumberBoard-itemName">
                    关注了<br>
                    <strong style="font-size: 20px">{{ $user->followings_count }}</strong>
                </div>
            </a>
        </div>
        <div class="profile">
            <a class="Profile-lightItem" href="">
                <span>关注的话题</span>
                <span class="lightItemValue">1</span>
            </a>
            <a class="Profile-lightItem" href="">
                <span>关注的问题</span>
                <span class="lightItemValue">1</span>
            </a>
            <a class="Profile-lightItem" href="">
                <span>关注的收藏夹</span>
                <span class="lightItemValue">1</span>
            </a>
            <span class="Profile-lightItem">个人主页被浏览10次</span>
        </div>
    </div>
    <link href="{{ asset('css/information.css') }}" rel="stylesheet">
    <script type="text/javascript">
        function show(sbutton) {
            if ($(sbutton).prev().height() == 55) {
                $(sbutton).prev().css('height', 'auto');
                $(sbutton).text('收起');
            } else {
                $(sbutton).prev().css('height', '85px');
                $(sbutton).text('阅读全文');
            }
            //$(target).hide();
        }

       /* $(function () {
            $('#myTab li:eq(1) a').tab('show');
        });*/
    </script>
@endsection
