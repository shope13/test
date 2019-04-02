@if($worker)
    @if($worker->boss==NULL)
        <span class="caret">
        {{$worker->name}}
            {{$worker->post}}
        </span>
    @endif
    {{--    @if($worker->boss->implode('parent_id', ', ') == $worker->id))--}}

    @if($worker->boss!=NULL)
        <ul class="nested">
            <li><span class="caret">
        {{$worker->name}}
                    {{$worker->post}}
        </span></li></ul>
    @endif
    @foreach($worker->workerBoss as $emp)
        @include('worker', ['worker' => $emp])
    @endforeach


@endif


