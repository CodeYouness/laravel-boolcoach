<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewMessageRequest;
use Illuminate\Http\Request;
use App\Models\Message;

class ApiMessageController extends Controller
{
    public function store(CreateNewMessageRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $newMessage = new Message([
            'coach_id' => $request->coach_id,
            'username' => $request->username,
            'email' => $request->email,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        dd($newMessage);
        return redirect()->away('http://localhost:5173/?message=sent');
    }

    public function create(Request $request){
        dd($request);
    }
}
