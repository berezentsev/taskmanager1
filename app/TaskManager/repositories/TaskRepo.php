<?php


namespace App\TaskManager\repositories;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class TaskRepo implements RepositoryInterface
{
    public function store(Request $request)
    {
        $this->validateData($request);
        $uuid = $this->genUuid();
        $priority = $this->adapterPriority($request['priority']);
        $status = $this->adapterStatus($request['status']);
        $tags = $this->adapterTags($request['tags']);

        Task::create([
            'uuid'=>$uuid,
            'title'=>$request['title'],
            'priority'=>$priority,
            'tags'=>$tags,
            'status'=>$status,
            'description'=>$request['description']
        ]);

        return true;
    }

    public function update(Request $request, Task $task)
    {
        $this->validateData($request);
        $priority = $this->adapterPriority($request['priority']);
        $status = $this->adapterStatus($request['status']);
        $tags = $this->adapterTags($request['tags']);
        $task->update([
            'title'=>$request['title'],
            'priority'=>$priority,
            'tags'=>$tags,
            'status'=>$status,
            'description'=>$request['description']
        ]);

        return true;
    }

    public function destroy(Task $task)
    {
        return $task->delete();
    }

    public function success(Task $task)
    {
        $task->update([
            'status'=>0
        ]);
    }

    public function work(Task $task)
    {
        $task->update([
            'status'=>1
        ]);
    }

    public function genUuid()
    {
        return Uuid::uuid4()->toString();
    }

    public function adapterPriority(string $priority)
    {
        switch ($priority) {
            case 'Низкий':
                return 1;
            case 'Средний':
                return 2;
            case 'Высокий':
                return 3;
            default:
                return false;
        }
    }

    public function adapterStatus(string $status)
    {
        return ($status == 'В работе') ? 1 : 0;
    }

    public function adapterTags(string $tags)
    {
        $tags = str_replace(' ', '', $tags);
        return json_encode($tags);
    }

    public function validateData(Request $request)
    {
        Validator::make($request->all(),
            [
                'title'=>'required|min:2',
                'priority'=>'in:'.implode(',', Task::PRIORITY),
                'status'=>'in:'.implode(',', Task::STATUS)
            ],
            [
                'required'=>'Необходимо заполнить поле :attribute',
                'min'=>'Поле :attribute должно содержать минимум два символа',
                'in'=>'Некорректное значение поля :attribute'
            ],
            [
                'title'=>'"Название задачи"',
                'priority'=>'"Приоритет задачи"',
                'status'=>'"Статус задачи"'
            ]
        )->validate();
    }
}
