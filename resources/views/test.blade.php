@extends('layouts.app')

@section('content')
<div class="container">
<h1>Home for all users</h1>

        @foreach ($workers as $worker)
            {{ $worker->name}}
        {{$worker->post}}
        @endforeach

    {{ $workers->links() }}
</div>
@endsection