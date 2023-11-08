<?php

namespace App\Services;

use App\Models\Game;

class GameService
{
    public function getGames()
    {
        return Game::orderBy('created_at','DESC')->get();
    }
}
