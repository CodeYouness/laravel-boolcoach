<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Node\Builder;
use App\Models\User;
use App\Models\Game;
use App\Models\Review;
use Hamcrest\Type\IsString;

class ApiUserController extends Controller
{
    public function index(){
        $users = User::with(['games', 'votes', 'reviews'])->get();

        return response()->json([
            'message'=>'success',
            'results' => $users,
            'apiKey' => 'your-api-key-value'
        ]);
    }

    public function show(String $id){
        $user = User::with(['games', 'votes', 'reviews'])->findOrFail($id);

        return response()->json([
            'message' => 'success',
            'results' => $user
        ]);
    }

    public function search(Request $request){
        $nicknameString = $request->input('nickname');
        $voteString = $request->input('vote_avg');
        $gameId = $request->input('game_id');

        $query = User::with(['games', 'reviews']);

        if ($nicknameString) {
            $query->where('users.nickname', 'like', $nicknameString.'%');
        }

        if ($gameId) {
            $query->join('game_user', 'users.id', '=', 'game_user.user_id')
                ->select('users.*')
                ->groupBy('users.id')
                ->where('game_user.game_id', $gameId);
        }

        if ($voteString) {
            $query->join('user_vote', 'users.id', '=', 'user_vote.user_id')
                    ->join('votes', 'user_vote.vote_id', '=', 'votes.id')
                    ->select('users.*', DB::raw('AVG(votes.value) as vote_average'))
                    ->groupBy('users.id')
                    ->having('vote_average', '>=', $voteString)
                    ->orderBy('vote_average', 'DESC');
        }

        $users = $query->get();

        // ! CODICE PER EVENTUALI DEBUG
        // $sql = $query->toSql();
        // $bindings = $query->getBindings();
        // dd($sql, $bindings);

        return response()->json([
            'message' => 'success',
            'results' => $users,
            'apiKey' => 'your-api-key-value'
        ]);
    }
}
