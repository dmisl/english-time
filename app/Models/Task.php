<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'body', 'lesson_id', 'task_type', 'task_images', 'position',
    ];

    protected $casts = [
        'task_images' => 'array'
    ];

    public function completedTasks()
    {
        return $this->hasMany(CompletedTask::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
