<?php


namespace App\TaskManager;


use App\TaskManager\repositories\TaskRepo;

class TaskManager
{
    public $taskRepo;

    public function __construct(TaskRepo $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function store($request)
    {
        return $this->taskRepo->store($request);
    }
}
