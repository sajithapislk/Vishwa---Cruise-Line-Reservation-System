<?php

namespace App\Http\Controllers\CustomerSupporter;

use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $users = LiveChat::select('user_id')->with('user')->groupBy('user_id')->get();
        // return  $users;
        return Inertia::render('CustomerSupporter/Dashboard',compact('users'));
    }
}
