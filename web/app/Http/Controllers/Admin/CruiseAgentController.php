<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseAgent;
use Illuminate\Http\Request;

class CruiseAgentController extends Controller
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
        return CruiseAgent::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseAgent $cruiseAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseAgent $cruiseAgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseAgent $cruiseAgent)
    {
        return $cruiseAgent->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseAgent $cruiseAgent)
    {
        $cruiseAgent->delete();
    }
}
