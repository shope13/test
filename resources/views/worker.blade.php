@if($worker)
        {{$worker->name}}
        {{$worker->post}}

    @if(count($worker->workerBoss) > 0)
        <ul>
            @foreach($worker->workerBoss as $emp)
               <li> @include('worker', ['worker' => $emp])</li>
                    @endforeach
        </ul>
    @endif
@endif

