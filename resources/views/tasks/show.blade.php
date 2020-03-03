@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $task->title }}</h2>
                <p class="blog-post-meta">Дата</p>
                <p>
                    {{ $task->description }}
                </p>
            </div>
        </div>
    </div>
    <a href="/" class="btn btn-success btn-sm">К списку задач</a>
@endsection
