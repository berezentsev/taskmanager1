<?php


namespace App\TaskManager;

use App\Task;
use App\TaskManager\repositories\TaskRepo;
use Illuminate\Http\Request;

class TaskManager
{
    public $taskRepo;

    public function __construct(TaskRepo $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function store(Request $request)
    {
        return $this->taskRepo->store($request);
    }

    public function update(Request $request, Task $task)
    {
        return $this->taskRepo->update($request, $task);
    }

    public function destroy(Task $task)
    {
        return $this->taskRepo->destroy($task);
    }

    public function success(Task $task)
    {
        return $this->taskRepo->success($task);
    }

    public function work(Task $task)
    {
        return $this->taskRepo->work($task);
    }

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
        switch ($task->status) {
            case 0:
                $task->status = 'Выполнена';
                break;
            case 1:
                $task->priority = 'В работе';
                break;
            default:
                return false;
        }
        //$task->status = ($task->status == 0) ? Task::STATUS[1] : Task::STATUS[0];
        $task->tags = json_decode($task->tags);

        return $task;
    }
}
