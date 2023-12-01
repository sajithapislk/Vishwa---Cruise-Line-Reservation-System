<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseLine;
use App\Models\CruiseLineAgent;
use App\Models\Ship;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseLineAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseLineAgent::all();
        $cruiseLines = CruiseLine::all();
        return Inertia::render('Admin/CruiseLineAgent',compact('list','cruiseLines'));
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
        $cruiseLineAgent = CruiseLineAgent::create([
            'cl_id'=>$request->cl_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return back()->with('success', 'insert successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseLineAgent $cruiseLineAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseLineAgent $cruiseLineAgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseLineAgent $cruiseLineAgent)
    {
        return $cruiseLineAgent->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseLineAgent $cruiseLineAgent)
    {
        $cruiseLineAgent->delete();
    }
}
