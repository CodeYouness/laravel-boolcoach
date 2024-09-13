<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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

    public function store(CreateNewMessageRequest $request)
    {
        $data = $request->validated();
        $newMessage = Message::create($data);

        return redirect()->away('http://localhost:5173/?message=sent');
    }
}
