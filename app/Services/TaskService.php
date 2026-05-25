<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function createTask(array $data)
    {
        $duplicate = Task::where(
            'title',
            $data['title']
        )
        ->where(
            'created_at',
            '>=',
            now()->subSeconds(10)
        )
        ->exists();

        if ($duplicate) {
            throw new \Exception(
                'Duplicate task detected.'
            );
        }

        return Task::create($data)->fresh();
    }
}