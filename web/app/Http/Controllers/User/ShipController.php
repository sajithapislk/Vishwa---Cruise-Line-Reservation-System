<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ships = Ship::all();
        return Inertia::render('Public/Ship/Index', compact('ships'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Ship $ship)
    {
        $ship=$ship->with('packages')->first();
        return Inertia::render('Public/Ship/View', compact('ship'));
    }
}
