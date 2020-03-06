<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const PRIORITY = ['Средний', 'Низкий', 'Высокий'];
    const STATUS = ['В работе', 'Выполнена'];
    protected $fillable = ['uuid', 'title', 'priority', 'tags', 'status', 'description'];
}
