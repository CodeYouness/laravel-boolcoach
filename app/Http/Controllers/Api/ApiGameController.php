<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiGameController extends Controller
{
    public function index(){
        $query = Game::with('users')
        ->join('game_user', 'games.id', '=', 'game_user.game_id')
        ->join('users', 'game_user.user_id', 'users.id')
        ->select('games.*')
        ->groupBy('games.name')
        ->orderBy('games.id')
        ->get();

        return response()->json([
            'message' => 'success',
            'results' => $query
        ]);
    }

    public function show(String $id){
        $game = Game::where('id', '=', $id)
            ->with('users')
            ->get();

        return response()->json([
            'message' => 'success',
            'results' => $game
        ]);
    }
}
