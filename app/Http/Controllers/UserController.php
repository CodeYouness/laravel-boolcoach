<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Game;
use App\Models\Message;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(User $users)
    {
        $users = $users->all()->where('id', Auth::id());
        $price = User::where('id', Auth::id())->pluck('price');
        $priceFormatted = number_format(floatval($price[0]), 2, ',', '.');
        $lastReviews = Review::where('coach_id', Auth::id())
            ->lazyByIdDesc(5, $column = 'id');

        $today = Carbon::today()->toDateString();
        $review = Review::where('coach_id', Auth::id())
            ->whereDate('created_at', '=', $today)
            ->get();


        $messages = Message::where('coach_id', Auth::id())
            ->whereDate('created_at', '=', $today)
            ->get();

        $sponsorship = User::join('sponsorship_user', 'sponsorship_user.user_id', '=', 'users.id')
            ->join('sponsorships', 'sponsorship_user.sponsorship_id', '=', 'sponsorships.id')
            ->select('users.*', 'sponsorship_user.end_date')
            ->where('users.id', Auth::id())
            ->where('sponsorship_user.end_date', '>', now())
            ->groupBy('users.id', 'sponsorship_user.end_date')
            ->get();

        $endDate = $sponsorship->pluck('end_date');

        return view('users.index', compact('users', 'price', 'lastReviews', 'review', 'messages', 'sponsorship', 'endDate',  'priceFormatted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User;
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (auth()->id() === $user->id) {
            $price = User::where('id', Auth::id())->pluck('price');
            $priceFormatted = number_format(floatval($price[0]), 2, ',', '.');
            return view('users.show', compact('user', 'priceFormatted'));
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Game $games)
    {
        if (auth()->id() === $user->id) {
            $games = Game::all();
            return view('users.edit', compact('user', 'games'));
        } else {
            return abort(403);
        }
    }

    /**
     *
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->hasFile('img_url')) {
            $filepath = $request->file('img_url')->store('avatars');

            //quello che viene salvato nel db
            $data['img_url'] = $filepath;
        }

        $user->update($data);

        if (isset($data['games'])) {
            $user->games()->sync($data['games']);
        }

        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if (auth()->id() === $user->id) {
            $user->delete();
            return redirect()->route('login')->with('message', 'L\'utente è stato cancellato');
        } else {
            return abort(403);;
        }
    }


    public function updateIsAvailable(Request $request, User $user)
    {
        $data = $request->input('is_available');

        $user->update(['is_available' => $data]);
        return redirect()->route('users.show', $user);
    }
}
