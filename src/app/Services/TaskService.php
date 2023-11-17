<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Game;

class TaskService
{
    public function getTasks($gameid)
    {
        return Task::where('game_id',$gameid)
        ->orderBy('created_at','DESC')
        ->get();
    }

 }
