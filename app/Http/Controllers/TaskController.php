<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }
}
