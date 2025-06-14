<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $status = request('status');
        $dueDate = request('due_date');
        $query = Task::where('user_id', auth()->id());

        if ($status) {
            $query->where('status', $status);
        }

        if ($dueDate === '7_days') {
            $query->whereBetween('due_date', [now(), now()->addDays(7)]);
        } elseif ($dueDate === '30_days') {
            $query->whereBetween('due_date', [now(), now()->addDays(30)]);
        }
        return view('task.index', [
            'tasks' => $query->orderBy('id','DESC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create', [
            'task' => Task::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request): RedirectResponse
    {
        // Validate the request
        $request->validated();
        Task::create($request->all());
        return redirect()->route('task.index')
                ->withSuccess('New task is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('task.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $request->validated();
        if (!$request->has('is_completed')) {
            $request->merge(['is_completed' => 0]);
        }
        $task->update($request->all());
        return redirect()->route('task.index')
                ->withSuccess('Task is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('task.index')
                ->withSuccess('Task is deleted successfully.');
    }

}
