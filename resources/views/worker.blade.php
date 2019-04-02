@if($worker)
    <span class="caret">
        {{$worker->name}}
        {{$worker->post}}
        </span>
{{--    @if($worker->boss->implode('parent_id', ', ') == $worker->id))--}}
    <ul class="nested">

            @foreach($worker->workerBoss as $emp)
               <li> @include('worker', ['worker' => $emp])</li>
                    @endforeach
        </ul>
    @endif
