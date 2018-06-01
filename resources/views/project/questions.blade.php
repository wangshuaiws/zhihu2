@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">所有问题</div>

                    <div class="panel-body">
                        @foreach($questions as $question)
                        <a href="/question/{{ $question->id }}" class="list-group-item"> {{ $question->title }} </a>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
