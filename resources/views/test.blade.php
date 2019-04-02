@extends('layouts.app')

@section('content')
<div class="container">
<h1>Employee hierarchy</h1>

    {{--@foreach($workers as $worker)--}}






    <ul>

        @foreach ($workers as $worker)
            <li>
                    @include('worker')

            </li>
        @endforeach
    </ul>
{{ $workers->links() }}

<!-- /example -->

</div>

@endsection
