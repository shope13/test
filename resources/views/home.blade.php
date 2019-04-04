@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of employees</h1>

        <div class="row">
            <div class="col-md-3">
                <form action="#" method="post">
                    <div class="input-group">
                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                        <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <table class="table table-list-search">
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
        </div>
    </div>
@endsection