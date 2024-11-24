<?php

namespace App\Http\Controllers\User;

use App\Events\UserNewMessage;
use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function handleUserMessage(Request $request)
    {
        // Load intents.json
        $intents = json_decode(Storage::get('intents.json'), true);

        $userMessage = strtolower($request->input('message'));
        $response = null;

        // Match user message with patterns
        foreach ($intents['intents'] as $intent) {
            foreach ($intent['patterns'] as $pattern) {
                if (stripos($userMessage, strtolower($pattern)) !== false) {
                    $response = $intent['responses'][array_rand($intent['responses'])];
                    break 2; // Stop loop if a match is found
                }
            }
        }

        // Return response or escalate to live support
        if ($response) {
            return response()->json(['response' => $response, 'is_bot' => true]);
        } else {
            return response()->json(['response' => 'Connecting you to live support...', 'is_bot' => false]);
        }
    }
}
