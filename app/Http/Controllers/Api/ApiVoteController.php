<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class ApiVoteController extends Controller
{
    public function index(){
        $votes = Vote::all();

        return response()->json([
            'message' => 'success',
            'data' => $votes
        ]);
    }
}
