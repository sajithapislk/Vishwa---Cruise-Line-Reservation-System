<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeparturePort;
use Illuminate\Http\Request;

class DeparturePortController extends Controller
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
        return DeparturePort::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$request->img,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DeparturePort $departurePort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeparturePort $departurePort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeparturePort $departurePort)
    {
        return $departurePort->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$request->img,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeparturePort $departurePort)
    {
        $departurePort->delete();
    }
}
