@if($worker)
    @if($worker->workerBoss == NULL)
    <span class="caret">
        {{$worker->name}}
        {{$worker->post}}
        </span>
    @endif
    @dump($worker->иoss)
{{--    @if($worker->boss->implode('parent_id', ', ') == $worker->id))--}}

    @if($worker->workerBoss != NULL)
<span class="caret">
        {{$worker->name}}
    {{$worker->post}}
        </span>
    @endif
    <ul class="nested">
            @foreach($worker->workerBoss as $emp)
               <li> @include('worker', ['worker' => $emp])</li>
                    @endforeach

    </ul>

    @endif
