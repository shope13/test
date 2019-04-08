@extends('layouts.app')

@section('content')
    <script>

        $('body').on("click", ".parent", function (e) {
            const element = this;
            $.ajax({
                url: ,
                type: "POST",
                data: {
                    name: "Ne pidor!"
                },
                success: function (response) {
                    $(element).append('<ul><li>' + response.name + '</li></ul>')
                }
            });


        });
    </script>
    <div class="container">
        <h1>Employee hierarchy</h1>
        <ul>
            @foreach(\App\Worker::with('employees')->whereNull('parent_id')->get() as $worker)
            <li>
                <div class='parent'>

                    {{$worker->name}}
                        ({{$worker->post}})

                </div>
            </li>
                @endforeach
        </ul>
    </div>

@endsection