@extends('layouts.layout')

@section('content')
    <a href="/tasks/create" class="btn btn-primary btn-sm">Добавить задачу</a>
    @foreach($tasks as $task)
        <div class="container d-flex justify-content-between border p-1">
            <div>
                @if($task->priority == 1)
                    <h6><a href="/tasks/{{$task->id}}">{{ $task->title }}</a></h6>
                @elseif($task->priority == 2)
                    <h6 class="text-primary">{{ $task->title }}</h6>
                @elseif($task->priority == 3)
                    <h6 class="text-danger">{{ $task->title }}</h6>
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

