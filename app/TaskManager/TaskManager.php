<?php


namespace App\TaskManager;

use App\Task;
use App\TaskManager\repositories\TaskRepo;
use Illuminate\Http\Request;

/**
 * Class TaskManager
 * @package App\TaskManager
 */
class TaskManager
{
    /**
     * @var TaskRepo
     */
    public $taskRepo;

    /**
     * TaskManager constructor.
     * @param TaskRepo $taskRepo
     */
    public function __construct(TaskRepo $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    /**
     * Сохранение новой задачи в БД
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        return $this->taskRepo->store($request);
    }

    /**
     * Обновление данных задачи в БД
     * @param Request $request
     * @param Task $task
     * @return bool
     */
    public function update(Request $request, Task $task)
    {
        return $this->taskRepo->update($request, $task);
    }

    /**
     * Удаление задачи
     * @param Task $task
     * @return bool|null
     */
    public function destroy(Task $task)
    {
        return $this->taskRepo->destroy($task);
    }

    /**
     * Помечаюм задачу как выполненную
     * @param Task $task
     */
    public function success(Task $task)
    {
        return $this->taskRepo->success($task);
    }

    /**
     * Помечаем задачу как находящуюся в работе
     * @param Task $task
     */
    public function work(Task $task)
    {
        return $this->taskRepo->work($task);
    }

    /**
     * Адаптация данных из БД для вывода на экран пользователя
     * @param Task $task
     * @return Task
     */
    public function forUserAdapter(Task $task)
    {
        switch ($task->priority) {
            case 1:
                $task->priority = 'Низкий';
                break;
            case 2:
                $task->priority = 'Средний';
                break;
            case 3:
                $task->priority = 'Высокий';
                break;
            default:
                return false;
        }
        $task->status = ($task->status == 0) ? Task::STATUS[1] : Task::STATUS[0];
        $task->tags = json_decode($task->tags);
        $task->tags = implode(', ', $task->tags);

        return $task;
    }
}
