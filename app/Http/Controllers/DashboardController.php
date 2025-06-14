<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
        {
            // Dashboad data Task count by status

            $taskCount = Task::where('user_id', auth()->id())->count();
            $taskCountByStatus = Task::selectRaw('status, COUNT(*) as count')
                ->where('user_id', auth()->id())
                ->groupBy('status')
                ->get()
                ->pluck('count', 'status')
                ->toArray();
            return view('dashboard', compact('taskCount', 'taskCountByStatus'));
        }
}
