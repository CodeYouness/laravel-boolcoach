<?php

namespace App\Http\Controllers;

use App\Models\sponsorship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();

        return view('sponsorships.index', compact('user'));
    }
}