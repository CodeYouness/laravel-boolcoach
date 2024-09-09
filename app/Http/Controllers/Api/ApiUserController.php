<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Review;

class ApiUserController extends Controller
{
    public function index(){
        $users = User::with(['games', 'votes', 'reviews'])->get();

        return response()->json([
            'message' => 'success',
            'results' => $users
        ]);
    }

    public function show(String $id){
        $user = User::with(['games', 'votes', 'reviews'])->findOrFail($id);

        return response()->json([
            'message' => 'success',
            'results' => $user
        ]);
    }
}
