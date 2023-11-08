<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Services\GameService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request,GameService $gameService)
    {
        $games = $gameService->getGames();
        return view('game.index')
            ->with('games',$games);
    }
}
