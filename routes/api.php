<?php

use App\Http\Controllers\Api\ApiGameController;
use App\Http\Controllers\Api\ApiMessageController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\MessageController;
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

Route::name('api')->group(function(){

    //! ROTTE USERS
    Route::get('/coaches', [ApiUserController::class, 'index'])->name('users.index');
    Route::get('/coaches/search', [ApiUserController::class, 'search'])->name('users.search');
    Route::get('/coaches/{id}', [ApiUserController::class, 'show'])->name('users.show');

    //! ROTTE GAMES
    Route::get('games', [ApiGameController::class, 'index'])->name('games.index');
    Route::get('games/{id}', [ApiGameController::class, 'show'])->name('games.show');

    //! ROTTE MESSAGES
    Route::post('/coaches/{id}', [ApiMessageController::class, 'create'])->name('message.store');
});
