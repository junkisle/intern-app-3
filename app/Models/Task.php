<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'task_title',
        'status',
        'task_description',
        'deadline',
    ];
}
