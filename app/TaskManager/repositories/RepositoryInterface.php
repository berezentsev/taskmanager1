<?php


namespace App\TaskManager\repositories;

use App\Task;
use Illuminate\Http\Request;

/**
 * Interface RepositoryInterface
 * @package App\TaskManager\repositories
 */
interface RepositoryInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @param Task $task
     * @return mixed
     */
    public function update(Request $request, Task $task);

    /**
     * @param Task $task
     * @return mixed
     */
    public function destroy(Task $task);

    /**
     * @param Task $task
     * @return mixed
     */
    public function success(Task $task);

    /**
     * @param Task $task
     * @return mixed
     */
    public function work(Task $task);

    /**
     * @param Request $request
     * @return mixed
     */
    public function validateData(Request $request);
}
