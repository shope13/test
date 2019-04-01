@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of employees</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Post</th>
                <th scope="col">Date of employment</th>
                <th scope="col">Salary</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
            <tr>
                <td>{{$worker->id}}</td>
                <td>{{$worker->name}}</td>
                <td>{{$worker->post}}</td>
                <td>{{$worker->DateEmp}}</td>
                <td>{{$worker->salary}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection