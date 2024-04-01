<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\Bookeds;
use App\Models\CruiseShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $cruiseLines = CruiseShip::where('cl_id',$user->cl_id)->get();
        $cruiseLineIDs = array();
        foreach ($cruiseLines as $key => $row) {
            array_push($cruiseLineIDs,$row->id);
        }
        // return  $cruiseLineIDs;
        $list = Bookeds::with('deal')->whereHas('deal', function ($query) use($cruiseLineIDs) {
            return $query->whereIn('s_id', $cruiseLineIDs);
        })->get();
        return Inertia::render('CruiseCompanyAgent/Dashboard',compact('list'));
    }
}
