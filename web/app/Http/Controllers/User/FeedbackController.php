<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomerFeedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request) {
        CustomerFeedback::create([
            'b_id' => $request->b_id,
            'user_id' => $request->user_id,
            'rate' => $request->rate
        ]);

        return back()->with('success','submit successful');
    }
}
