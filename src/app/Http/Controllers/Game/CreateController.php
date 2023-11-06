<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\CreateRequest;
use App\Models\Game;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $game = new Game;
        $game->title = $request->game();
        $game->save();
        return redirect()->route('game.index');
    }
}
