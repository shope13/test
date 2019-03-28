@extends('layouts.app')

@section('content')
<div class="container">
<h1>Home for all users</h1>


<!-- example -->
<ul>
  <li>
    <span class="caret">Главный босс</span>
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
</ul>
<!-- /example -->
<br/>
<hr/>
<br/>


    <ul>
        @foreach ($workers as $worker)
        <li>
            <span class="caret">{{ $worker->name}}</span>
            <ul class="nested">
                <li>{{$worker->post}}</li>
            </ul>
        </li>
        @endforeach
    </ul>
    {{ $workers->links() }}
</div>
@endsection