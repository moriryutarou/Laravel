<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Game;

class TaskService
{
    public function getTasks()
    {
        return Task::orderBy('created_at','DESC')->get();
    }

    public function checkOwnTask(int $gameId, int $taskId): bool
    {
        $task= Task::where('id',$taskId)->first();
        if(!$task){
            return false;
        }

        return $task->game_id === $gameId;
    }
}
