@extends('layouts.app')

@section('content')
<div class="container">
<h1>Home for all users</h1>


<!-- example -->
<ul>

    @foreach ($workers as $worker)

        <li>
            @if($worker->parent_id==NULL)
                <span class="caret">
            {{ $worker->name}}
        ({{ $worker->post}})</span>
            @endif
    <ul class="nested">
      <li>Саббосс</li>
      <li><span class="caret">Саббосс 2 уровня</span>
        <ul class="nested">
          <li>Ну и так далее</li>
          <li><span class="caret">Это просто для примера</span>
            <ul class="nested">
              <li>Примера </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
    @endforeach
</ul>
{{ $workers->links() }}

<!-- /example -->
<br/>
<hr/>
<br/>
</div>
@endsection