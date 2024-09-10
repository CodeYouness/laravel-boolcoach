<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class ApiGameController extends Controller
{
    public function index(){
        $games = Game::all();

        return response()->json([
            'message' => 'success',
            'results' => $games
        ]);
    }

    public function show(String $id){
        $game = Game::findOrFail($id);

        return response()->json([
            'message' => 'success',
            'results' => $game
        ]);
    }
}
