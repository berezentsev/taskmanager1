<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App
 */
class Task extends Model
{
    const PRIORITY = ['Средний', 'Низкий', 'Высокий'];
    const STATUS = ['В работе', 'Выполнена'];
    /**
     * @var array
     */
    protected $fillable = ['uuid', 'title', 'priority', 'tags', 'status', 'description'];
}
