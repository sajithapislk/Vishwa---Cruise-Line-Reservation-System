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
    public function index($id)
    {
        $list = LiveChat::where('user_id', $id)->get();
        return response()->json($list);
    }

    public function store(Request $request)
    {
        $chat = new LiveChat();

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
        $bestMatchScore = PHP_INT_MAX; // Initialize with a high value
        $bestResponse = null;

        // Match user message with patterns using fuzzy logic
        foreach ($intents['intents'] as $intent) {
            foreach ($intent['patterns'] as $pattern) {
                // Calculate the Levenshtein distance
                $levenshteinDistance = levenshtein($userMessage, strtolower($pattern));

                // Check if this pattern is a better match
                if ($levenshteinDistance < $bestMatchScore) {
                    $bestMatchScore = $levenshteinDistance;
                    $bestResponse = $intent['responses'][array_rand($intent['responses'])];
                }
            }
        }

        // Define a threshold for fuzzy matching
        $threshold = 5; // You can adjust this value based on your needs

        // Return response or escalate to live support
        if ($bestMatchScore <= $threshold && $bestResponse) {
            return response()->json([
                'msg' => $bestResponse,
                'who_inserted' => 'BOT',
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        } else {
            return response()->json([
                'msg' => 'Connecting you to live support...',
                'who_inserted' => 'BOT',
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
