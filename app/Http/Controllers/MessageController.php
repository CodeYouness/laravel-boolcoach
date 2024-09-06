<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::where('coach_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }

}