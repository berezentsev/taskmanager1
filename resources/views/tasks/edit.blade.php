@extends('layouts.layout')

@section('content')
    <h3>Редактирование задачи</h3>
    <form action="/tasks/{{$task->id}}" method="post">
        {{csrf_field()}}
        {!! method_field('patch') !!}
        <div class="form-group-row">
            <label for="title" class="col-sm-6 col-form-label text-primary font-weight-bold">Название задачи</label>
            <input type="text" class="col-sm-4 text-secondary font-weight-normal" name="title" id="title" value="{{$task->title}}">
        </div>
        <div class="form-group-row">
            <label for="priority" class="col-sm-6 col-form-label text-primary font-weight-bold">Приоритет задачи</label>
            <select class="col-sm-2 text-secondary font-weight-normal" name="priority" id="priority">
                @foreach($priority as $item)
                    @if($task->priority == $item)
                        <option selected>{{$item}}</option>
                    @else
                        <option>{{$item}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group-row">
            <label for="status" class="col-sm-6 col-form-label text-primary font-weight-bold">Статус задачи</label>
            <select class="col-sm-2 text-secondary font-weight-normal" name="status" id="status">
                @foreach($status as $item)
                    @if($task->status == $item)
                        <option selected>{{$item}}</option>
                    @else
                        <option>{{$item}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group-row">
            <label for="tags" class="col-sm-6 col-form-label text-primary font-weight-bold">Теги задачи(можно указать несколько тэгов через запятую)</label>
            <input type="text" class="col-sm-4 text-secondary" name="tags" id="tags"  value="{{$task->tags}}">
        </div>
        <div class="form-group-row">
            <label for="description" class="col-sm-6 col-form-label text-primary font-weight-bold">Подробное описание задачи</label>
            <textarea class="col-sm-4 text-secondary font-weight-light" name="description" id="description" rows="3">{{$task->description}}</textarea>
        </div>
        <div class="form-group-row">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="/" class="btn btn-secondary">Отмена</a>
        </div>
        @include('layouts.errors')
    </form>
@endsection

