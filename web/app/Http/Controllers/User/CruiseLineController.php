<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CruiseLine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cruiseLines = CruiseLine::all();
        return Inertia::render('Public/CruiseLines', compact('cruiseLines'));
    }


    /**
     * Display the specified resource.
     */
    public function show(CruiseLine $cruiseLine)
    {
        $cruiseLine = $cruiseLine->with('ships')->first();
        return Inertia::render('Public/CruiseLine/Index', compact('cruiseLine'));
    }
}
