<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();

        return view('statistics.index', compact('user'));
    }
}