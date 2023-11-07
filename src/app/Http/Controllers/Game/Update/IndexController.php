<?php

namespace App\Http\Controllers\Game\Update;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

use function Livewire\Volt\title;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $gameId = (int) $request->route('gameId');
        $game = Game::where('id',$gameId)->firstOrFail();
        return view('game.update')->with('game',$game);
    }
}
