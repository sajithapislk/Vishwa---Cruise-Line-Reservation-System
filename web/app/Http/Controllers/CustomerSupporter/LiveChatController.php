<?php

namespace App\Http\Controllers\CustomerSupporter;

use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;

class LiveChatController extends Controller
{
    public function index($id) {
        $list = LiveChat::where('user_id',$id)->get();
        return response()->json($list);
    }
}
