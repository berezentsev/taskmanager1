<?php

namespace App\Http\Controllers;

use App\TaskManager\TaskManager;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public $taskManager;

    public function __construct(TaskManager $taskManager)
    {
        $this->taskManager = $taskManager;
    }

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
        return view('tasks.create', ['status'=>Task::STATUS, 'priority'=>Task::PRIORITY]);
    }

    public function store(Request $request)
    {
        $this->taskManager->store($request);
        return redirect('/');
    }

    public function edit(Task $task)
    {
        $task = $this->taskManager->forUserAdapter($task);
        return view('tasks.edit',  ['task'=>$task, 'status'=>Task::STATUS, 'priority'=>Task::PRIORITY]);
    }

    public function update(Request $request, Task $task)
    {
        $this->taskManager->update($request, $task);
        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $this->taskManager->destroy($task);
        return redirect('/');
    }

    public function success(Task $task)
    {
        $this->taskManager->success($task);
        return redirect('/');
    }

    public function work(Task $task)
    {
        $this->taskManager->work($task);
        return redirect('/');
    }
}
