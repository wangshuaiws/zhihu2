@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="page-header">
                            <h3>
                                {{ $question->title }}
                            </h3>
                        </div>
                        <p> {{ $question->body }} </p>
                        <a href="{{ $question->id  }}/edit" class="btn btn-primary">写回答</a>
                    </div>
                            <div class="app-main">
                                <div class="home" style="padding-top: 10px;background-color: #f3f3f3">
                                    <div class="main" style="background-color: #f3f3f3;width: auto">
                                        @foreach($answer as $value)
                                            <div class="main-content">
                                                <div class="item">
                                                    <button onclick="delContent(this)" data-toggle="tooltip" title="不感兴趣" class="close button"><i class="iconfont icon-guanbi1"></i></button>
                                                    <div class="feed">
                                                        <div class="feed-source">
                                                            <div class="frist-line">
                                                                来自话题:
                                                                <a href="###">
                                                                    <div class="popover">
                                                                        {{ $value->topic }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="author-info">
                                    <span class="user-link">
                                        <div class="popover">
                                            <a href="###">
                                                <img class="avatar" src="{{  asset('avatars/default.jpg') }}" alt="">
                                            </a>
                                        </div>
                                    </span>
                                                                <div class="author-content">
                                                                    <div class="info-head">
                                                                        <a href="/information/{{ $value->name }}" class="user-name">
                                                                            {{ $value->name }} ，
                                                                        </a>
                                                                    </div>
                                                                    <div class="info-detil">
                                                                        <div class="text">
                                                                            {{ $value->signature }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h2 class="item-title">

                                                    </h2>
                                                    <div class="item-meta"></div>
                                                    <div class="item-content">
                                                        <div class="answer-info">
                                                            <a href="###" class="voters button">
                                                                {{ $value->votes_count }} 人赞同了该回答
                                                            </a>
                                                        </div>
                                                        <div class="content-inner">
                                <span class="text">
                                   {!!  $value->body  !!}
                                </span>

                                                        </div>
                                                        <button class="btn btn-primary read">阅读全文</button>
                                                        <div class="item-time">
                                                            <span>编辑于 {{ $value->updated_at }}</span>
                                                        </div>
                                                        <div class="item-actions">
                                                            <input type="hidden" value="{{ $value->now_id }}">
                                <span>
                                    <button class="button vote-button" onclick="vote(this,'up')"><i
                                                class="iconfont icon-xiangshang"></i>
                                        <span class="votes_count">{{ $value->votes_count }}</span>
                                    </button>
                                    <button class="button vote-button" onclick="vote(this,'down')"><i class="iconfont icon-xiangxia"></i></button>
                                </span>
                                                            <button class=" button action" onclick="show(this)">
                                        <span><i class="iconfont icon-detailscomments"></i>
                                            {{ $value->comments_count }}
                                            条评论</span>
                                                            </button>
                                                            <button class="item-collect button action" onclick="collections(this)">
                                                                <i class="iconfont icon-collection-b"></i><span>收藏</span>
                                                            </button>
                                                            <button class="item-like button action">
                                                                <span><i class="iconfont icon-msnui-love"></i>感谢</span>
                                                            </button>
                                                        </div>
                                                        <div style="display: none;margin-top: 10px">
                                                            <ul class="list-group" style="font-size: 15px">
                                                            </ul>
                                                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}"
                                                                 style="margin-top: 12px">
                                                                <form action="/comment/create" method="post">
                                                                    {{ csrf_field() }}
                                                                    <label for="comment"></label>
                                                                    <input type="text" name="comment" style="width: 88%" class="form-control"
                                                                           placeholder="写评论" id="comment">
                                                                    <input class="answer_id" type="hidden" name="answer"
                                                                           value="{{ $value->id }}">
                                                                    <button class="btn btn-primary pull-right" type="submit"
                                                                            style="margin-top: -34px">提交
                                                                    </button>
                                                                    @if ($errors->has('comment'))
                                                                        <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/main-content.js') }}">
    </script>
    <link href="{{ asset('fonts/font_631887_6m66ttw1c2nvcxr/iconfont.css') }}" rel="stylesheet">
    <link href="{{ asset('css/zhihu.css') }}" rel="stylesheet">
@endsection
