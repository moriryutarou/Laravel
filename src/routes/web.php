<?php

use App\Models\Game;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/game',\App\Http\Controllers\Game\IndexController::class)
->name('game.index');

Route::post('/game/create',\App\Http\Controllers\Game\CreateController::class)
->name('game.create');

Route::get('/game/update/{gameId}', \App\Http\Controllers\Game\Update\IndexController::class)->name('game.update.index');
Route::put('/game/update/{gameId}',\App\Http\Controllers\Game\Update\PutController::class)->name('game.update.put');

Route::get('/', function () {
    return view('welcome');
});
