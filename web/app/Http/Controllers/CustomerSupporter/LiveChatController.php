<?php

namespace App\Http\Controllers\CustomerSupporter;

use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;

class LiveChatController extends Controller
{
    public function index() {
        $list = LiveChat::all();
        return response()->json($list);
    }
}
