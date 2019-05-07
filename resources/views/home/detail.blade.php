<div class="container">
    <div class="col-md-8 offset-md2">
        <h2>Show Info</h2>
        <hr>
        <table class="table">
            <tr><td><h2>Name: </h2></td>
                <td><h2>{{ $workers->name }}</h2></td></tr>
            <tr><td><h2>Post: </h2></td>
                <td><h2>{{ $workers->post }}</h2></td></tr>
            <tr><td><h2>Date of employees: </h2></td>
                <td><h2>{{ $workers->DateEmp }}</h2></td></tr>
            <tr><td><h2>Salary: </h2></td>
                <td><h2>{{ $workers->salary }}</h2></td></tr>
            <tr><td><h2>Boss: </h2></td>
                <td><h2>{{ $workers->boss['name'] }}</h2></td></tr>
        </table>






        <a class="btn btn-xs btn-danger" href="javascript:ajaxLoad('{{ url('home') }}')">Back</a>
    </div>
</div>