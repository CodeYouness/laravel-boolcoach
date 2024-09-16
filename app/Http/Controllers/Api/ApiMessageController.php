<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewMessageRequest;
use Illuminate\Http\Request;
use App\Models\Message;

class ApiMessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        if(!empty($data)) {
            foreach ($data as $singleData) {
                $message = Message::create($singleData);
                $message->save();
            }
        }
    }

    public function create(Request $request){
        dd($request);
    }
}
