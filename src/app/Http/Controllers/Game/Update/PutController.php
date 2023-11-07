<?php

namespace App\Http\Controllers\Game\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\UpdateRequest;
use App\Models\Game;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $game = Game::where('id',$request->id())->firstOrFail();
        $game->title = $request->game();
        $game->save();
        return redirect()
                ->route('game.update.index',['gameId' =>$game->id])
                ->with('feedback.success',"タイトルを編集しました");
    }
}
