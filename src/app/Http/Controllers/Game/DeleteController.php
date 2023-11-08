<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Services\GameService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,GameService $gameService)
    {
        $gameId = (int) $request->route('gameId');
        if (!$gameService->checkOwnGame($request->user()->id,$gameId)){
            throw new AccessDeniedHttpException();
        }
        $game = Game::where('id',$gameId)->firstOrFail();
        $game->delete();
        return redirect()
            ->route('game.index')
            ->with('feedback.success',"タイトルを削除しました");
    }
}
