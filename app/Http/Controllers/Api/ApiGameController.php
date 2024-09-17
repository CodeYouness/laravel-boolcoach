<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiGameController extends Controller
{
    public function index()
    {
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
    ->leftJoin('users', 'users.id', '=', 'game_user.user_id')
    ->leftJoin('user_vote', 'user_vote.user_id', '=', 'users.id')
    ->leftJoin('votes', 'votes.id', '=', 'user_vote.vote_id')
    ->leftJoin('sponsorship_user', 'sponsorship_user.user_id', '=', 'users.id')
    ->leftJoin('sponsorships', 'sponsorships.id', '=', 'sponsorship_user.sponsorship_id')

    ->select(
        'games.id as game_id',
        'games.name as game_name',
        'games.genre as game_genre',
        'games.img as game_img',

        'users.id as user_id',
        'users.name as user_name',
        'users.surname as user_surname',
        'users.nickname as user_nickname',
        'users.img_url as user_img_url',
        'users.price as user_price',
        'users.email as user_email',

        DB::raw('COALESCE(AVG(votes.value), 0) as vote_average'),

        'sponsorships.id as sponsorship_id',
        'sponsorships.name as sponsorship_name',
        'sponsorships.created_at as sponsorship_start',
        'sponsorships.updated_at as sponsorship_end'
    )

    ->where('games.id', '=', $id)
    ->groupBy(
        'games.id',
        'users.id',
        'sponsorships.id'
    )
    ->get();

        return response()->json([
            'message' => 'success',
            'results' => $game
        ]);
    }
}
