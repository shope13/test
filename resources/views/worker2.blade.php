@if($worker)
@if($worker->parent_id != NULL)
    <span class="caret">
        {{$worker->name}}
        ({{$worker->post}})
        </span>
@endif

<ul class="nested">
    @foreach($worker->workerBoss as $emp)
        <li> @include('worker2', ['worker' => $emp])</li>
    @endforeach

</ul>
@endif