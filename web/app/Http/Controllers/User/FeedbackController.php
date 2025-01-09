<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomerFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request) {
        $user = Auth::user();
        CustomerFeedback::create([
            'b_id' => $request->b_id,
            'user_id' => $user->id,
            'comment' => $request->comment
        ]);

        return back()->with('success','submit successful');
    }
}
