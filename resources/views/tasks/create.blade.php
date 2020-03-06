@extends('layouts.layout')

@section('content')
    <h3>Добавление новой задачи</h3>
    <form action="/tasks/add" method="post">
        {{csrf_field()}}
        <div class="form-group-row">
            <label for="title" class="col-sm-6 col-form-label text-primary font-weight-bold">Название задачи</label>
            <input type="text" class="col-sm-4 text-secondary font-weight-normal" name="title" id="title" placeholder="Новая задача">
        </div>
        <div class="form-group-row">
            <label for="priority" class="col-sm-6 col-form-label text-primary font-weight-bold">Приоритет задачи</label>
            <select class="col-sm-2 text-secondary font-weight-normal" name="priority" id="priority">
                @foreach($priority as $item)
                    <option>{{$item}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group-row">
            <label for="status" class="col-sm-6 col-form-label text-primary font-weight-bold">Статус задачи</label>
            <select class="col-sm-2 text-secondary font-weight-normal" name="status" id="status">
                @foreach($status as $item)
                    <option>{{$item}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group-row">
            <label for="tags" class="col-sm-6 col-form-label text-primary font-weight-bold">Теги задачи(можно указать несколько тэгов через запятую)</label>
            <input type="text" class="col-sm-4 text-secondary" name="tags" id="tags" placeholder="#simpletask">
        </div>
        <div class="form-group-row">
            <label for="description" class="col-sm-6 col-form-label text-primary font-weight-bold">Подробное описание задачи</label>
            <textarea class="col-sm-4 text-secondary font-weight-light" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="form-group-row">
            <button type="submit" class="btn btn-success">Добавить</button>
        </div>
        @include('layouts.errors')
    </form>
@endsection
