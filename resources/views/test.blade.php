@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee hierarchy</h1>
        <ul class="list-group">
            @foreach($workers as $worker)
            <li class="list-group-item">
                <div class="parent" data-id="{{$worker->id}}">
                    {{$worker->id}}
                    {{$worker->name}}
                        ({{$worker->post}})
                    {{$worker->parent_id}}

                </div>
                @endforeach
            {{$workers->render()}}
        </ul>

    </div>

@endsection