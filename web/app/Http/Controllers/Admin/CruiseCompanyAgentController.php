<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseCompany;
use App\Models\CruiseCompanyAgent;
use App\Models\CruiseShip;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseCompanyAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseCompanyAgent::all();
        $cruiseCompanies = CruiseCompany::all();
        return Inertia::render('Admin/CruiseCompanyAgent',compact('list','cruiseCompanies'));
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
        $cruiseLineAgent = CruiseCompanyAgent::create([
            'cc_id'=>$request->cc_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return back()->with('Successfully Inserted', 'Agent');
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseCompanyAgent $cruiseLineAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseCompanyAgent $cruiseLineAgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseCompanyAgent $cruiseLineAgent)
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
    public function destroy($id)
    {
        CruiseCompanyAgent::find($id)->delete();
        return back()->with('success', 'delete successful');
    }
}
