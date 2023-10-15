<?php

namespace App\Http\Controllers\CustomerSupporter;

use App\Events\CustomerSupporterNewMessage;
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
        $chat->user_id = $request->id;
        $chat->who_inserted = 'CUSTOMER_SUPPORTER';
        $chat->save();

        event(new CustomerSupporterNewMessage($chat));

        return $chat;
    }
}
