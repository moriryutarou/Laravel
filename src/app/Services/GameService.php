<?php

namespace App\Services;

use App\Models\Game;

class GameService
{
    public function getGames()
    {
        return Game::orderBy('created_at','DESC')->paginate(5);
    }

    public function checkOwnGame(int $userId, int $gameid): bool
    {
        $game= Game::where('id',$gameid)->first();
        if(!$game){
            return false;
        }

        return $game->user_id === $userId;
    }
}
