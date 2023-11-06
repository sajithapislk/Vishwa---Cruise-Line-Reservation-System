<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
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
        return Port::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$request->img,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Port $port)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Port $port)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Port $port)
    {
        return $port->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$request->img,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Port $port)
    {
        $port->delete();
    }
}