<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseLine;
use Illuminate\Http\Request;

class CruiseLineController extends Controller
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
        return CruiseLine::create([
            'name'=>$request->name,
            'tp'=>$request->tp,
            'description'=>$request->description
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseLine $cruiseLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseLine $cruiseLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseLine $cruiseLine)
    {
        return $cruiseLine->update([
            'name'=>$request->name,
            'tp'=>$request->tp,
            'description'=>$request->description
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseLine $cruiseLine)
    {
        $cruiseLine->delete();
    }
}

