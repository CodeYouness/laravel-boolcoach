<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Node\Builder;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Game;
use App\Models\Message;
use App\Models\Review;
use App\Models\Vote;
use Hamcrest\Type\IsString;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

class ApiUserController extends Controller
{
    public function index()
    {
        $users = User::with(['games', 'votes', 'reviews'])
        ->join('user_vote', 'user_vote.user_id', '=', 'users.id')
        ->join('votes', 'votes.id', '=', 'user_vote.vote_id')
        ->select('users.*', DB::raw('AVG(votes.value) as vote_average'))
        ->groupBy('users.id')
        //eventuale orderBy va inserito qui
        ->get();

        foreach ($users as $user) {
            if (Str::startsWith($user->img_url, 'avatars')) {
                $user->img_url = Storage::url($user->img_url);
            }
        }

        $sponsoredUsers = User::with('games', 'votes')
        ->leftJoin('user_vote', 'user_vote.user_id', '=', 'users.id')
        ->leftJoin('votes', 'user_vote.vote_id', '=', 'votes.id')
        ->leftJoin('sponsorship_user', 'sponsorship_user.user_id', '=', 'users.id')
        ->leftJoin('sponsorships', 'sponsorship_user.sponsorship_id', '=', 'sponsorships.id')
        ->select('users.*', DB::raw('AVG(votes.value) as vote_average'), 'sponsorship_user.end_date')
        ->where('sponsorship_user.end_date', '>', Carbon::now()->timezone('Europe/Rome'))
        ->groupBy('users.id', 'sponsorship_user.end_date')
        ->orderBy('vote_average', 'desc')
        ->where('is_available', true)
        ->get();

        foreach ($sponsoredUsers as $user) {
            if (Str::startsWith($user->img_url, 'avatars')) {
                $user->img_url = Storage::url($user->img_url);
            }
        }

        return response()->json([
            'message' => 'success',
            'results' => [
                'users' => $users,
                'sponsoredUsers' => $sponsoredUsers,
            ],
            'apiKey' => 'your-api-key-value',
        ]);
    }

    public function show(String $id) {
        $user = User::with(['games', 'votes', 'reviews'])
            ->where('users.id', '=', $id)
            ->select('users.*', DB::raw('COALESCE(AVG(votes.value), 0) as vote_average'))
            ->leftJoin('user_vote', 'user_vote.user_id', '=', 'users.id')
            ->leftJoin('votes', 'user_vote.vote_id', '=', 'votes.id')
            ->groupBy('users.id')
            ->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'results' => null
            ], 404);
        }

        if (!isNull($user->img_url) && Str::startsWith($user->img_url, 'avatars')) {
            $user->img_url = Storage::url($user->img_url);
        }

        if (Str::startsWith($user->img_url, 'avatars')) {
            $user->img_url = Storage::url($user->img_url);
            // Storage::url($user->img_url)

        }

        return response()->json([
            'message' => 'success',
            'results' => $user
        ]);
    }


    public function search(Request $request){
        $nicknameString = $request->input('nickname');
        $voteString = $request->input('vote_avg');
        $gameId = $request->input('game_id');

        $query = User::with(['games', 'reviews', 'votes'])
            ->leftJoin('user_vote', 'users.id', '=', 'user_vote.user_id')
            ->leftJoin('votes', 'user_vote.vote_id', '=', 'votes.id')
            ->select('users.*', DB::raw('COALESCE(AVG(votes.value), 0) as vote_average'))
            ->groupBy('users.id')
            ->where('is_available', true);

        if ($nicknameString) {
            $query->where('users.nickname', 'like', $nicknameString.'%');
        }

        if ($gameId) {
            $query->join('game_user', 'users.id', '=', 'game_user.user_id')
                ->where('game_user.game_id', $gameId);
        }

        if ($voteString) {
            $query->having(DB::raw('AVG(votes.value)'), '>=', $voteString);
        }

        $query->orderBy('vote_average', 'DESC');

        $users = $query->get();

        foreach ($users as $user) {
            if (Str::startsWith($user->img_url, 'avatars')) {
                $user->img_url = Storage::url($user->img_url);
            }
        }
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


    public function store(Request $request)
    {
        $data = $request->all();

        //! STORE DEI MESSAGGI
        if(!empty($data['messages'])) {
            foreach ($data['messages'] as $singleData) {
                $message = Message::create($singleData);
                $message->save();
            }
        }

        //! STORE DELLE RECENSIONI
        if(!empty($data['reviews'])) {
            foreach ($data['reviews'] as $data) {
                $review = Review::create($data);
                $review->save();
            }
        }

        //! STORE DEI VOTI
        if(!empty($data['votes'])) {
            foreach ($data['votes'] as $voteData) {
                $user = User::findOrFail($voteData['user_id']);
                $user->votes()->attach($data['votes']);
            }
        }
    }
}
