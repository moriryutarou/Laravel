<?php

namespace App\Http\Controllers\Search\task;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Task;
use Illuminate\Http\Request;

class NameSearchController extends Controller
{
    public function index(Request $request)
    {
        $gameid = request()->query('gameid');
        $game = Game::find($gameid);

        if(isset($request->keyword)){
            $tasks = Task::where('name',"LIKE", "%$request->keyword%")
                            ->paginate(10);
        }else{
            $tasks = array();
        }
        return view('task.index')
            ->with('tasks',$tasks)
            ->with('game',$game);
    }
}
