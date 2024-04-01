<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bookeds;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseDealController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Bookeds::all();
        return Inertia::render('User/Bookeds', compact('list'));
    }
}
