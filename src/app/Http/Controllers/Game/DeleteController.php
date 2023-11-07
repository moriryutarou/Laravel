<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $gameId = (int) $request->route('gameId');
        $game = Game::where('id',$gameId)->firstOrFail();
        $game->delete();
        return redirect()
            ->route('game.index')
            ->with('feedback.success',"タイトルを削除しました");
    }
}
