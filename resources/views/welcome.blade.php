@extends('layouts.app')

@section('content')
    <div class="app-main">
        <div class="container home ">
            <div class="main">
                <div class="card">
                    <div class="card-hender">
                        <div class="card-header-nav">
                            <button  class="link"  data-toggle="modal" data-target="#myModal"><i class="iconfont icon-tiwen-"></i>提问</button>
                            <button  class="link "><i class="iconfont icon-wenzhang"></i>回答</button>
                            <a href="/article/create" class="link "><i class="iconfont icon-tianxie"></i>写文章</a>
                        </div>
                    </div>
                </div>

                <div class="main-content">
                    <div class="item">
                        <button class="close button" ><i class="iconfont icon-guanbi1"></i></button>
                        <div class="feed">
                            <div class="feed-source">
                                <div class="frist-line">
                                    来自话题:
                                    <a href="###">
                                        <div class="popover">
                                            Vue.js
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
                                            <a href="###" class="user-name">
                                                王小帅 ，
                                            </a>
                                        </div>
                                        <div class="info-detil">
                                            <div class="text">
                                                angular.cn 译者，儒家信徒，资深面试官
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="item-title">
                            <a href="###">你为什么不用 React?</a>
                        </h2>
                        <div class="item-meta"></div>
                        <div class="item-content">
                            <div class="answer-info">
                                <a href="###" class="voters button">
                                    13 人赞同了该回答
                                </a>
                            </div>
                            <div class="content-inner">
                                <span class="text">
                                    1. 审美上完全不能接受 JSX 和全家桶。<br />
                                    2. 有较深的后端基础，很轻松就精通了 Angular，没必要再学一个定位相似的东西。<br />
                                    3. 只要需要，有信心一周内边干边学达到中级水平，没必要提前投资，性价比太低。<br />
                                </span>
                            </div>
                            <div class="item-time">
                                <a href="###">编辑于 2018-04-12</a>
                            </div>
                            <div class="item-actions">
                                <span>
                                    <button class="button vote-button"><i class="iconfont icon-xiangshang" ></i> 14</button>
                                    <button class="button vote-button"><i class="iconfont icon-xiangshang" ></i></button>
                                </span>
                                <button class=" button action">
                                    <span><i class="iconfont icon-detailscomments"></i>14 条评论</span>
                                </button>
                                <button class="item-collect button action">
                                    <span><i class="iconfont icon-collection-b"></i>收藏</span>
                                </button>
                                <button class="item-like button action">
                                    <span><i class="iconfont icon-msnui-love"></i>喜欢</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aside col-md-3">

            </div>
        </div>

    </div>
    @include('project/createQuestionModal')
    <link href="{{ asset('fonts/font_631887_6m66ttw1c2nvcxr/iconfont.css') }}" rel="stylesheet">
    <link href="{{ asset('css/zhihu.css') }}" rel="stylesheet">
@endsection
