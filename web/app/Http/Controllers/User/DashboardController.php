<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $list = Book::with('payment','reservation')->where('user_id',auth()->user()->id)->get();
        // return $list;
        return Inertia::render('User/Dashboard',compact('list'));
    }
}
