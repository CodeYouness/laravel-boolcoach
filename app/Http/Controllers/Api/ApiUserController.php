<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Node\Builder;
use App\Models\User;
use App\Models\Game;
use App\Models\Review;

class ApiUserController extends Controller
{
    public function index(String $id){
        $users = User::with(['games', 'votes', 'reviews']);

        return response()->json([
            'message'=>'success',
            'message' => 'success',
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

        $users = User::with(['games', 'votes', 'reviews'])
        ->join('user_vote', 'users.id', '=', 'user_vote.user_id')
        ->join('votes', 'user_vote.vote_id', '=', 'votes.id')
        ->select('users.*', DB::raw('avg(votes.value) as vote_average' ))
        ->groupBy('users.id')
        ->where('users.nickname', 'like', $nicknameString.'%')
        ->orderBy('vote_average', 'DESC')
        ->having('vote_average', '>=',  $voteString)
        ->get();

        return response()->json([
            'message' => 'success',
            'results' => $users,
            'apiKey' => 'your-api-key-value'
        ]);
    }
}
