<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Task\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

//Game
Route::get('/game', \App\Http\Controllers\Game\IndexController::class)
    ->name('game.index');
Route::middleware('auth')->group(function () {
    Route::post('/game/create', \App\Http\Controllers\Game\CreateController::class)
        ->name('game.create');
    Route::get('/game/update/{gameId}', \App\Http\Controllers\Game\Update\IndexController::class)
        ->name('game.update.index');
    Route::put('/game/update/{gameId}', \App\Http\Controllers\Game\Update\PutController::class)
        ->name('game.update.put');
    Route::delete('/game/delete/{gameId}', \App\Http\Controllers\Game\DeleteController::class)
        ->name('game.delete');
});

//Task
Route::resource('/task',TaskController::class);
Route::resource('/task/create',TaskController::class);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
