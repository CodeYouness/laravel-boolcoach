<?php

use App\Http\Controllers\Api\ApiGameController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//! ROTTE USERS
Route::get('/coaches', [ApiUserController::class, 'index'])->name('api.users.index');
Route::get('/coaches/{id}', [ApiUserController::class, 'show'])->name('api.users.show');


//! ROTTE GAMES
Route::get('games', [ApiGameController::class, 'index'])->name('api.games.index');
Route::get('games/{id}', [ApiGameController::class, 'show'])->name('api.games.show');
