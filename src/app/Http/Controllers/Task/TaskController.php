<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use App\Models\Game;
use App\Services\TaskService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskService = new TaskService;
        $gameId = request()->query('gameId');
        $tasks = $taskService->getTasks($gameId);
        return view('task.index')
            ->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $task = new Task();
        $task->name = $request->input('task');
        $task->game_id = $request->input('game_id');

        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $task = Task::where('id',$id)->firstOrFail();
        $task->name = $request->task();
        $task->save();
        return redirect()
            ->route('task.index',$task->game_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()
            ->route('task.index',$task->game_id);
    }
}
