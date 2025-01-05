<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\CruiseShip;
use App\Models\CruiseShipRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CruiseShipRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cruiseAgent = Auth::user();
        $ships = CruiseShip::where('cc_id',$cruiseAgent->cc_id)->pluck('id');
        $list = CruiseShipRoom::whereIn('s_id',$ships)->get();
        return Inertia::render('CruiseCompanyAgent/CruiseShipRoom/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cruiseAgent = Auth::user();
        $ships = CruiseShip::where('cc_id',$cruiseAgent->cc_id)->get();
        return Inertia::render('CruiseCompanyAgent/CruiseShipRoom/Insert',compact('ships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseShipRoom $cruiseShipRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseShipRoom $cruiseShipRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseShipRoom $cruiseShipRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseShipRoom $cruiseShipRoom)
    {
        //
    }
}
