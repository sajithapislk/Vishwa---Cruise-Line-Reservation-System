<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseLineType;
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
        return CruiseLineType::create([
            'name'=>$request->name
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseLineType $shipType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseLineType $shipType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseLineType $shipType)
    {
        return $shipType->update([
            'name'=>$request->name
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseLineType $shipType)
    {
        return $shipType->delete();
    }
}
