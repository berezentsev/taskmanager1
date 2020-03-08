@extends('layouts.layout')

@section('content')
    <a href="/tasks/create" class="btn btn-primary btn-sm">Добавить задачу</a>
    <div class="container mb-5">
    @foreach($tasks as $task)
        @if($task->status == 1)
        <div class="container d-flex justify-content-between border p-1">
            <div>
                @if($task->priority == 1)
                    <h6><a class="text-success" href="/tasks/{{$task->id}}">{{$task->title}}</a></h6>
                @elseif($task->priority == 2)
                    <h6><a class="text-primary" href="/tasks/{{$task->id}}">{{$task->title}}</a></h6>
                @elseif($task->priority == 3)
                    <h6><a class="text-danger" href="/tasks/{{$task->id}}">{{$task->title}}</a></h6>
                @endif
            </div>
            <div>
                <a href="/tasks/{{$task->id}}/edit" class="btn btn-primary btn-sm">Редактировать</a>
                <a href="/tasks/{{$task->id}}/success" class="btn btn-success btn-sm">Выполнить</a>
                <form class="d-inline-block" action="/tasks/{{$task->id}}" method="post">
                    {{csrf_field()}}
                    {!! method_field('delete') !!}
                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
            </div>
        </div>
        @endif
    @endforeach
    </div>
    <h5>Выполненные задачи</h5>
    <div class="container">
    @foreach($tasks as $task)
        @if($task->status == 0)
            <div class="container d-flex justify-content-between border p-1">
                <div>
                        <h6><a class="text-info" href="/tasks/{{$task->id}}">{{$task->title}}</a></h6>
                </div>
                <div>
                    <a href="/tasks/{{$task->id}}/work" class="btn btn-secondary btn-sm">Вернуть в работу</a>
                    <form class="d-inline-block" action="/tasks/{{$task->id}}" method="post">
                        {{csrf_field()}}
                        {!! method_field('delete') !!}
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach
    </div>
@endsection

