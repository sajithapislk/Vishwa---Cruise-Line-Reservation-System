<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function store(Request $request) {
        Refund::create([
            'b_id' => $request->b_id,
            'user_id' => $request->user_id,
            'amount' => $request->amount
        ]);

        return back()->with('success','submit successful');
    }
}
