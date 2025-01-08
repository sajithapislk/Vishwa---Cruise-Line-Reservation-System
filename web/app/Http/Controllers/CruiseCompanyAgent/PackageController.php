<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\CruiseShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cruiseAgent = Auth::user();
        $ships = CruiseShip::where('cc_id',$cruiseAgent->cc_id)->pluck('id');
        $list = Package::whereIn('s_id',$ships)->get();
        $ships = CruiseShip::where('cc_id',$cruiseAgent->cc_id)->get();
        return Inertia::render('CruiseCompanyAgent/Package',compact('list','ships'));
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
        $package = Package::create([
            'name'=>$request->name,
            's_id'=>$request->s_id,
            'is_d'=>$request->is_d,
            'is_bl'=>$request->is_bl,
            'is_en'=>$request->is_en,
            'is_c'=>$request->is_c,
            'is_ona'=>$request->is_ona,
            'is_outa'=>$request->is_outa,
            'is_kt'=>$request->is_kt,
            'is_w'=>$request->is_w,
            'is_s'=>$request->is_s,
        ]);
        return back()->with('Package', 'Sucessfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }

    function cruisePackage($cruise_id) {
        return Package::where('s_id',$cruise_id)->get();
    }
}
