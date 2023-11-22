<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->keyword)){
            $games = Game::where('title',"LIKE", "%$request->keyword%")
                            ->paginate(5);
        }else{
            $games = array();
        }
        return view('game.index')
        ->with('games',$games);
    }
}
