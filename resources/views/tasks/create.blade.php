@extends('layouts.layout')

@section('content')
    <h3>Добавление новой задачи</h3>
    <form action="" method="post">
        <div class="from-group-row">
            <label for="title" class="col-sm-6 col-form-label text-primary font-weight-bold">Название задачи</label>
            <input type="text" class="col-sm-4 text-secondary font-weight-normal" name="title" id="title" placeholder="Новая задача">
        </div>
        <div class="from-group-row">
            <label for="priority" class="col-sm-6 col-form-label text-primary font-weight-bold">Приоритет задачи</label>
            <input type="text" class="col-sm-2 text-secondary font-weight-normal" name="priority" id="priority" value="Средний">
        </div>
        <div class="from-group-row">
            <label for="status" class="col-sm-6 col-form-label text-primary font-weight-bold">Статус задачи</label>
            <input type="text" class="col-sm-2 text-secondary font-weight-normal" name="status" id="status" value="В работе">
        </div>
        <div class="from-group-row">
            <label for="tags" class="col-sm-6 col-form-label text-primary font-weight-bold">Теги задачи(можно указать несколько тэгов через запятую)</label>
            <input type="text" class="col-sm-4 text-secondary" name="tags" id="tags" placeholder="#simpletask">
        </div>
        <div class="from-group-row">
            <label for="description" class="col-sm-6 col-form-label text-primary font-weight-bold">Подробное описание задачи</label>
            <textarea class="col-sm-4 text-secondary font-weight-light" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="from-group-row">
            <button type="submit" class="btn btn-success">Добавить</button>
        </div>
    </form>
@endsection

