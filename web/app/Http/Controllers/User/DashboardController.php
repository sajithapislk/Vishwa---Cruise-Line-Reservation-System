<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $list = Books::with('payment','reservation')->get();
        // return $list;
        return Inertia::render('User/Dashboard',compact('list'));
    }
}
