<?php

namespace App\Http\Controllers\User;

use App\Events\UserNewMessage;
use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;

class LiveChatController extends Controller
{
    public function index($id) {
        $list = LiveChat::where('user_id',$id)->get();
        return response()->json($list);
    }

    public function store(Request $request)
    {
        $chat = new LiveChat;

        $chat->msg = $request->message;
        $chat->cs_id = $request->id;
        $chat->user_id = 1;
        $chat->who_inserted = 'USER';
        $chat->save();

        event(new UserNewMessage($chat));

        return $chat;
    }
}
