<?php


namespace App\TaskManager\repositories;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class TaskRepo implements RepositoryInterface
{
    /**
     * Сохранение новой задачи в БД
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        $this->validateData($request);
        $uuid = $this->genUuid();
        $priority = $this->adapterPriority($request['priority']);
        $status = $this->adapterStatus($request['status']);
        $tags = $this->adapterTags($request['tags']);

        Task::create([
            'uuid' => $uuid,
            'title' => $request['title'],
            'priority' => $priority,
            'tags' => $tags,
            'status' => $status,
            'description' => $request['description']
        ]);

        return true;
    }

    /**
     * Обновление данных задачи в БД
     * @param Request $request
     * @param Task $task
     * @return bool
     */
    public function update(Request $request, Task $task)
    {
        $this->validateData($request);
        $priority = $this->adapterPriority($request['priority']);
        $status = $this->adapterStatus($request['status']);
        $tags = $this->adapterTags($request['tags']);
        $task->update([
            'title' => $request['title'],
            'priority' => $priority,
            'tags' => $tags,
            'status' => $status,
            'description' => $request['description']
        ]);

        return true;
    }

    /**
     * Удаление задачи
     * @param Task $task
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        return $task->delete();
    }

    /**
     * Помечаюм задачу как выполненную
     * @param Task $task
     */
    public function success(Task $task)
    {
        $task->update([
            'status' => 0
        ]);
    }

    /**
     * Помечаем задачу как находящуюся в работе
     * @param Task $task
     */
    public function work(Task $task)
    {
        $task->update([
            'status' => 1
        ]);
    }

    /**
     * Генерируем uuid4
     * @return string
     * @throws \Exception
     */
    public function genUuid()
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * Адаптируем полученные данные приоритета для сохранения в БД
     * @param string $priority
     * @return bool|int
     */
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

    /**
     * Адаптируем полученные данные статуса для сохранения в БД
     * @param string $status
     * @return int
     */
    public function adapterStatus(string $status)
    {
        return ($status == 'В работе') ? 1 : 0;
    }

    /**
     * Адаптируем полученные данные о тэгах для сохранения в БД
     * @param string $tags
     * @return false|string
     */
    public function adapterTags(string $tags)
    {
        $tags = explode(',', str_replace(' ', '', $tags));
        return json_encode($tags);
    }

    /**
     * Валидируем данные формы
     * @param Request $request
     */
    public function validateData(Request $request)
    {
        Validator::make($request->all(),
            [
                'title' => 'required|min:2',
                'priority' => 'in:' . implode(',', Task::PRIORITY),
                'status' => 'in:' . implode(',', Task::STATUS)
            ],
            [
                'required' => 'Необходимо заполнить поле :attribute',
                'min' => 'Поле :attribute должно содержать минимум два символа',
                'in' => 'Некорректное значение поля :attribute'
            ],
            [
                'title' => '"Название задачи"',
                'priority' => '"Приоритет задачи"',
                'status' => '"Статус задачи"'
            ]
        )->validate();
    }
}
