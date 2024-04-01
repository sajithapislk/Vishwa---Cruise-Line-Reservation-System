<?php

namespace App\Http\Controllers\CruiseLineAgent;

use App\Http\Controllers\Controller;
use App\Models\Bookeds;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $list = Bookeds::all();
        return Inertia::render('CruiseCompanyAgent/Dashboard',compact('list'));
    }
}
