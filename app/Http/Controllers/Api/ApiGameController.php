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
        $game = Game::join('game_user', 'games.id', '=', 'game_user.game_id')
        ->join('users', 'users.id', '=', 'game_user.user_id')
        ->join('user_vote', 'user_vote.user_id', '=', 'users.id')
        ->join('votes', 'votes.id', '=', 'user_vote.vote_id')
        ->join('sponsorship_user', 'sponsorship_user.user_id', '=', 'user_vote.user_id')
        ->join('sponsorships', 'sponsorships.id', '=', 'sponsorship_user.sponsorship_id')

        ->select('games.*', 'users.*','sponsorships.*',  DB::raw('COALESCE(AVG(votes.value), 0) as vote_average'))
        ->groupBy('games.id', 'users.id', 'sponsorships.id')
        ->where('games.id', '=', $id)
        ->get();

        return response()->json([
            'message' => 'success',
            'results' => $game
        ]);
    }
}
