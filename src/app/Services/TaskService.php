<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Game;

class TaskService
{
    public function getTasks($gameId)
    {
        return Task::where('game_id',$gameId)
        ->orderBy('created_at','DESC')
        ->get();
    }

 }
