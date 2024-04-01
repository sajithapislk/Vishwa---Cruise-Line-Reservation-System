<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Package;
use App\Models\CruiseShip;
use App\Models\UpcomingReservations;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UpcomingDealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ships = CruiseShip::all();
        $ports = Port::all();
        $packages = Package::all();

        $upcomingDeals = UpcomingReservations::with('package','ship','arrival_port','departure_port','room','deals')->get();
        // return $upcomingDeals;

        return Inertia::render('Public/UpcomingReservations/Index',compact('ships','ports','packages','upcomingDeals'));
    }


    /**
     * Display the specified resource.
     */
    public function show(UpcomingReservations $upcomingDeal)
    {
        //
    }

    public function filter(Request $request) {
        // dd($request);
        $list = UpcomingReservations::with('package','ship','arrival_port','departure_port','room','deals')
        ->when($request->ship_id, function ($query) use ($request) {
            return $query->Where('s_id', $request->ship_id);
        })
        ->when($request->dp_id, function ($query) use ($request) {
            return $query->Where('dp_id', $request->dp_id);
        })
        ->when($request->dp_id, function ($query) use ($request) {
            return $query->Where('dp_id', $request->depart_id);
        })
        ->when($request->ap_id, function ($query) use ($request) {
            return $query->Where('ap_id', $request->arrive_id);
        })
        ->when($request->depart_at, function ($query) use ($request) {
            return $query->WhereDate('depart_at', $request->depart_at);
        })
        ->get();

        return $list;

        // $ships = CruiseShip::all();
        // $ports = Port::all();
        // $packages = Package::all();

        // return Inertia::render('Public/UpcomingReservations/Filter',compact('ships','departurePorts','packages','list','request'));
    }
}
