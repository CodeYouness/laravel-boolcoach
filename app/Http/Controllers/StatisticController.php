<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){
        $user = Auth::user();
        $coachId = $user->id;

        $votesDistribution = DB::table('user_vote')
            ->join('votes', 'user_vote.vote_id', '=', 'votes.id')
            ->join('users', 'user_vote.user_id', '=', 'users.id')
            ->where('users.id', $coachId)
            ->select('votes.value', DB::raw('COUNT(votes.value) as vote_count'))
            ->groupBy('votes.value')
            ->orderBy('votes.value', 'asc')
            ->get();

        $labels = $votesDistribution->pluck('value')->toArray();
        $data = $votesDistribution->pluck('vote_count')->toArray();

        return view('statistics.index', compact('labels', 'data'));
    }
}