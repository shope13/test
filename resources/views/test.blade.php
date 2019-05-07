@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Employee hierarchy</h1>
        <ul class="list-group" id="list">
            @foreach($workers as $worker)
            <li class="list-group-item">
                <div class="parent"  data-id="{{$worker->id}}">
                    {{$worker->name}}
                        ({{$worker->post}})
                </div>
                @endforeach
        </ul>
        <br>
        <ul class="pagination">
        {{$workers->links()}}
        </ul>
    </div>
    <script src="{{ asset('js/employeesScript.js') }}" defer></script>
@endsection

