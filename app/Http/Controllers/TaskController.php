<?php

namespace App\Http\Controllers;

use App\TaskManager\TaskManager;
use Illuminate\Http\Request;
use App\Task;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @var TaskManager
     */
    public $taskManager;

    /**
     * TaskController constructor.
     * @param TaskManager $taskManager
     */
    public function __construct(TaskManager $taskManager)
    {
        $this->taskManager = $taskManager;
    }

    /**
     * Вывод главной страницы с задачами
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::all()->sortByDesc('priority');
        return view('welcome', compact('tasks'));
    }

    /**
     * Просмотр конкретной задачи
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Создание новой задачи
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.create', ['status' => Task::STATUS, 'priority' => Task::PRIORITY]);
    }

    /**
     * Сохранение новой задачи в БД
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->taskManager->store($request);
        return redirect('/');
    }

    /**
     * Редактирование задачи
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Task $task)
    {
        $task = $this->taskManager->forUserAdapter($task);
        return view('tasks.edit', ['task' => $task, 'status' => Task::STATUS, 'priority' => Task::PRIORITY]);
    }

    /**
     * Обновление данных задачи в БД
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Task $task)
    {
        $this->taskManager->update($request, $task);
        return redirect('/');
    }

    /**
     * Удаление задачи
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Task $task)
    {
        $this->taskManager->destroy($task);
        return redirect('/');
    }

    /**
     * Помечаюм задачу как выполненную
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function success(Task $task)
    {
        $this->taskManager->success($task);
        return redirect('/');
    }

    /**
     * Помечаем задачу как находящуюся в работе
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function work(Task $task)
    {
        $this->taskManager->work($task);
        return redirect('/');
    }
}
