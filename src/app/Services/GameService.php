<?php

namespace App\Services;

use App\Models\Game;

class GameService
{
    public function getGames()
    {
        return Game::orderBy('created_at','DESC')->get();
    }

    public function checkOwnGame(int $userId, int $gameId): bool
    {
        $game= Game::where('id',$gameId)->first();
        if(!$game){
            return false;
        }

        return $game->user_id === $userId;
    }
}
