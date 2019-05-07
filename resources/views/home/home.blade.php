<div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h1>List of employees</h1>
            </div>
            <div class="col-sm-5">
                <div class="pull-right">
                    <div class="input-group">
                        <input class="form-control" id="search"
                               value="{{ request()->session()->get('search') }}"
                               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('/home')}}?search='+this.value)"
                               placeholder="Search" name="search"
                               type="text" />
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary"
                                    onclick="ajaxLoad('{{url('home')}}?search='+$('#search').val())">
                                <i class="fa fa-search" aria-hidden="true">Search</i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
                <table class="table" >
            <thead>
            <tr>
                @php
                    $textUp = '<i class="fa fa-fw fa-sort-asc"></i>';
                    $textDown = '<i class="fa fa-fw fa-sort-desc"></i>';
                @endphp
                <th><a href="javascript:ajaxLoad('{{url('home?field=id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">ID</a>
                {!! request()->session()->get('field')=='id'?(request()->session()->get('sort')=='asc'?$textUp:$textDown):''!!}</th>
                <th><a href="javascript:ajaxLoad('{{url('home?field=name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Name</a>
                {!! request()->session()->get('field')=='name'?(request()->session()->get('sort')=='asc'?$textUp:$textDown):''!!}</th>
                <th><a href="javascript:ajaxLoad('{{url('home?field=post&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Post</a>
                {!! request()->session()->get('field')=='post'?(request()->session()->get('sort')=='asc'?$textUp:$textDown):''!!}</th>
                <th><a href="javascript:ajaxLoad('{{url('home?field=DateEmp&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Date of employment</a>
                {!! request()->session()->get('field')=='DateEmp'?(request()->session()->get('sort')=='asc'?$textUp:$textDown):''!!}</th>
                <th><a href="javascript:ajaxLoad('{{url('home?field=salary&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Salary</a>
                {!! request()->session()->get('field')=='salary'?(request()->session()->get('sort')=='asc'?$textUp:$textDown):''!!}</th>
                <th><a href="javascript:ajaxLoad('{{url('home?field=employees&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Boss</a>
                {!! request()->session()->get('field')=='employees'?(request()->session()->get('sort')=='asc'?$textUp:$textDown):''!!}</th>
                <th>
                    <a href="javascript:ajaxLoad('{{url('home/create')}}')"
                       class="btn btn-primary btn-xs"> <i class="fa fa-plus" aria-hidden="true"></i> Add new workers</a>
                </th>

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
                <td>{{$worker->boss['name']}}</td>
                <td>
                    <a class="btn btn-info btn-xs" title="Show"
                       href="javascript:ajaxLoad('{{url('home/show/'.$worker->id)}}')">
                        Show</a>
                    <a class="btn btn-warning btn-xs" title="Edit"
                       href="javascript:ajaxLoad('{{url('home/update/'.$worker->id)}}')">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete"
                       href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('home/delete/'.$worker->id)}}','{{csrf_token()}}')">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <ul class="pagination">
        {{$workers->links()}}
    </ul>
</div>

