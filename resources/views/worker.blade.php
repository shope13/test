@if($worker)
        <span class="caret">
        {{$worker->name}}
        ({{$worker->post}})
        </span>

    <ul class="nested">

        @foreach($worker->workerBoss as $emp)
{{--            @dd($emp)--}}
{{--            @dd(\App\Worker::with('workerBoss')->whereNotNull('parent_id')->get())--}}
            <li> @include('worker', ['worker' => $emp])</li>
        @endforeach
    </ul>

@endif
