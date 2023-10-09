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
        $ports = Port::all();
        $packages = Package::all();

        $upcomingDeals = UpcomingDeal::with('package','ship','arrival_port','departure_port','room','deals')->get();
        // return $upcomingDeals;

        return Inertia::render('Public/UpcomingDeal/Index',compact('ships','ports','packages','upcomingDeals'));
    }


    /**
     * Display the specified resource.
     */
    public function show(UpcomingDeal $upcomingDeal)
    {
        //
    }

    public function filter(Request $request) {
        // dd($request);
        $list = UpcomingDeal::with('package','ship','arrival_port','departure_port')
        ->when($request->ship_id, function ($query) use ($request) {
            return $query->Where('s_id', $request->ship_id);
        })
        ->when($request->dp_id, function ($query) use ($request) {
            return $query->Where('dp_id', $request->dp_id);
        })
        ->when($request->p_id, function ($query) use ($request) {
            return $query->Where('p_id', $request->p_id);
        })
        ->when($request->depart_at, function ($query) use ($request) {
            return $query->WhereDate('depart_at', $request->depart_at);
        })
        ->when($request->arrive_at, function ($query) use ($request) {
            return $query->WhereDate('arrive_at', $request->arrive_at);
        })
        ->get();

        return response()->json($list);

        // $ships = Ship::all();
        // $ports = Port::all();
        // $packages = Package::all();

        // return Inertia::render('Public/UpcomingDeal/Filter',compact('ships','departurePorts','packages','list','request'));
    }
}
