<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class InsertDataTask extends Command
{
    protected $signature = 'insert:data';
    protected $description = 'Insert data into the tasks table';

    public function handle()
    {
        $taskName = "task name";
        $data = [
            'time' => now(), 
            'task_name' => $this->generateTaskName($taskName),
            'email' => $this->generateTaskName($taskName) . '@gmail.com',
        ];

        Task::create($data);
        $this->info('Data inserted successfully.');
    }

    private function generateTaskName($taskName)
    {
        $currentDate = date('d_m_H_i');
        return $currentDate . '_' . str_replace(' ', '_', strtolower($taskName));
    }
}
