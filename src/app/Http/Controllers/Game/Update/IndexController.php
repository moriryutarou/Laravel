<?php

namespace App\Http\Controllers\Game\Update;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,GameService $gameService)
    {
        $gameid = (int) $request->route('gameid');
        if (!$gameService->checkOwnGame($request->user()->id,$gameid)){
            throw new AccessDeniedHttpException();
        }
        $game = Game::where('id',$gameid)->firstOrFail();
        return view('game.update')->with('game',$game);
    }
}
