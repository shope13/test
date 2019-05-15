@extends('layouts.app')
@section('content')
    <div id="content">
        @include('home/home')
    </div>
    <div class="loading">
        <i class="fa fa-refresh fa-spin fa-2x fa-tw"></i>
        <br>
        <span>Loading</span>
    </div>
@endsection
