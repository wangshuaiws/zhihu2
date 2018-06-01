@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="homepage">
            <div class="home-back" ></div>
            <img class="avatar" src="{{ asset($user->avatar) }}" alt="头像">
            <div class="personal">
                <span style="font-size: 26px"><b>{{ $user->name }}</b></span>
                <span style="font-size: 18px;margin-left: 10px;">{{ $user->signature }}</span>
                <a href="{{ Route('information',$user->name) }}" style="margin-left: 630px" class="btn btn-primary">返回个人主页</a>
            </div>
        </div>
        <div class="middle-main" style="height: auto">
                <div class="panel-body">
                    {!! Form::open(['route'=>'edit_information','method'=>'POST','files'=>'true']) !!}
                    <div class="form-group">
                        {!! Form::label('signature','一句话介绍自己 :',['class'=>'control-label']) !!}
                        {!! Form::text('signature',null,['class'=>'form-control','placeholder'=>'一句话介绍自己']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('avatar','个人头像 :',['class'=>'control-label']) !!}
                        {!! Form::file('avatar') !!}
                    </div>

                </div>
                <div class="modal-footer">
                    {!! Form::submit('提交',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
    <link href="{{ asset('css/information.css') }}" rel="stylesheet">
@endsection
