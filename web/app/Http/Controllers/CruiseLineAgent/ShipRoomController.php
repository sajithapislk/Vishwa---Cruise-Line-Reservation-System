<?php

namespace App\Http\Controllers\CruiseLineAgent;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use App\Models\ShipRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShipRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ShipRoom::all();
        return Inertia::render('CruiseLineAgent/ShipRoom/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ships = Ship::all();
        return Inertia::render('CruiseLineAgent/ShipRoom/Select',compact('ships'));
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
    public function show(ShipRoom $shipRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShipRoom $shipRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShipRoom $shipRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShipRoom $shipRoom)
    {
        //
    }

    function select_ship(Ship $ship) {
        return Inertia::render('CruiseLineAgent/ShipRoom/Insert',compact('ship'));
    }

    function cruiseRoom($cruise_id) {
        return ShipRoom::where('s_id',$cruise_id)->get();
    }

}
