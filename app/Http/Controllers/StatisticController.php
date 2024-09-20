<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){
        $user = Auth::user();
        $coachId = $user->id;

        // voti ricevuti per mese
        $votes = DB::table('user_vote')
            ->join('votes', 'user_vote.vote_id', '=', 'votes.id')
            ->join('users', 'user_vote.user_id', '=', 'users.id')
            ->where('users.id', $coachId)
            ->select(
                DB::raw('YEAR(user_vote.created_at) as year'),
                DB::raw('MONTH(user_vote.created_at) as month'),
                DB::raw('COUNT(votes.value) as vote_count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Statistiche per mese
        $messages = DB::table('messages')
            ->where('messages.coach_id', $coachId)
            ->select(
                DB::raw('YEAR(messages.created_at) as year'),
                DB::raw('MONTH(messages.created_at) as month'),
                DB::raw('COUNT(messages.id) as message_count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Recensioni per mese
        $reviewsMonth = DB::table('reviews')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as review_count'))
            ->where('coach_id', $coachId)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Preparo i dati per i grafici e le statistiche
        $voteLabels = $votes->map(function($item) {
            return $item->month . '/' . $item->year;
        })->toArray();

        $voteData = $votes->pluck('vote_count')->toArray();

        $messageLabels = $messages->map(function($item) {
            return $item->month . '/' . $item->year;
        })->toArray();

        $messageData = $messages->pluck('message_count')->toArray();

        $reviewData = $reviewsMonth->pluck('review_count');

        return view('statistics.index', compact('voteLabels', 'voteData', 'messageLabels', 'messageData', 'reviewData'));
    }
}