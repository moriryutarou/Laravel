<?php

namespace App\Http\Controllers\Game\Update;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function Livewire\Volt\title;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id = (int) $request->route('id');
        $game = Game::where('id',$id)->firstOrFail();
        dd($game);
    }
}
