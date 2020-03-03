@extends('layouts.layout')

@section('content')

    @foreach($tasks as $task)
        <div class="container d-flex justify-content-between border p-3">
            <div>
                @if($task->priority == 1)
                    <h4><a href="/tasks/{{$task->id}}">{{ $task->title }}</a></h4>
                @elseif($task->priority == 2)
                    <h4 class="text-primary">{{ $task->title }}</h4>
                @elseif($task->priority == 3)
                    <h4 class="text-danger">{{ $task->title }}</h4>
                @endif
            </div>
            <div>
                <a href="" class="btn btn-primary btn-sm">Редактировать</a>
                <a href="" class="btn btn-success btn-sm">Выполнить</a>
                <a href="" class="btn btn-danger btn-sm">Удалить</a>
            </div>
        </div>
    @endforeach

@endsection

