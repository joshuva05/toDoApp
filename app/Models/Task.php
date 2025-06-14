<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\TaskObserver;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'is_completed',
        'status',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::observe(TaskObserver::class);
    }
}
