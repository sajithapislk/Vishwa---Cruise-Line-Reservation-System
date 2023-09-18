<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Package;
use App\Models\Ship;
use App\Models\UpcomingDeal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UpcomingDealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ships = Ship::all();
        $departurePorts = Port::all();
        $packages = Package::all();

        $list = UpcomingDeal::with('package','ship','arrival_port','departure_port')->get();

        return Inertia::render('Public/UpcomingDeal/Index',compact('ships','departurePorts','packages','list'));
    }


    /**
     * Display the specified resource.
     */
    public function show(UpcomingDeal $upcomingDeal)
    {
        //
    }

    public function filter(Request $request) {
        dd($request);
        return UpcomingDeal::where('ship_id',$request->ship_id)
        ->orWhere('ship_id',$request->ship_id)
        ->orWhere('dp_id',$request->dp_id)
        ->orWhere('p_id',$request->p_id)
        ->orWhere('depart_at',$request->depart_at)
        ->orWhere('arrive_at',$request->arrive_at)
        ->get();
    }
}
