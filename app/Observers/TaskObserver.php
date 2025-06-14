<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    /**
     * Handle the Task "saving" event.
     */
    public function saving(Task $task): void
    {
        $task->status = 'pending';
        $task->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
    }

    /**
     * Handle the Task "updating" event.
     */
    public function updating(Task $task): void
    {
        // If is_completed = false and due_date < today
        if (!$task->is_completed && $task->due_date < now()) {
            $task->status = 'overdue';
        }

        if (!$task->is_completed && $task->due_date > now()) {
            $task->status = 'pending';
        }

        // If the task is completed, set status to completed
        if ($task->is_completed) {
            $task->status = 'completed';
        }
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
