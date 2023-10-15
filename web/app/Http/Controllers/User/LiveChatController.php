<?php

namespace App\Http\Controllers\User;

use App\Events\UserNewMessage;
use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $chat->user_id = Auth::id();
        $chat->who_inserted = 'USER';
        $chat->save();

        event(new UserNewMessage($chat));

        return $chat;
    }
}
