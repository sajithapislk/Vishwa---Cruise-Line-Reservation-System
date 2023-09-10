<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShipType;
use Illuminate\Http\Request;

class ShipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return ShipType::create([
            'name'=>$request->name
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShipType $shipType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShipType $shipType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShipType $shipType)
    {
        return $shipType->update([
            'name'=>$request->name
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShipType $shipType)
    {
        return $shipType->delete();
    }
}
