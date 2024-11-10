<?php

namespace App\Http\Controllers;

use App\Models\CruiseShip;
use App\Models\Package;
use App\Models\Port;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ships = CruiseShip::all();
        $ports = Port::all();
        $packages = Package::all();
        $user_id = Auth::id();

        return Inertia::render('Welcome', compact('user_id','ships','ports','packages'));
    }
}
