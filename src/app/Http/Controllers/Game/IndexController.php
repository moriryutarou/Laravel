<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $games = Game::orderBy('created_at','DESC')->get();
        return view('game.index')
            ->with('games',$games);
    }
}
