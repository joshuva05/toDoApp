<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class UpdateTaskStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        Task::where('due_date', '<', $today)
            ->where('status', '!=', 'completed')
            ->where('is_completed', false)
            ->update(['status' => 'overdue']);

        $this->info('Task statuses updated successfully.');
    }
}
