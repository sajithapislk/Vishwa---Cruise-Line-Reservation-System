<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseCompany;
use App\Models\CruiseCompanyAgent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseCompany::all();
        return Inertia::render('Admin/CruiseCompany/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/CruiseCompany/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cruiseCompany = CruiseCompany::create([
            'name'=>$request->name,
            'tp'=>$request->tp,
            'description'=>$request->description,
            'img'=>''
        ]);

        if (!is_null($request->img)) {
            $image = time() . '-l' . '.' . $request->img->extension();
            $request->file('img')->storeAs('cruise-company/', $image);

            $cruiseCompany->img = $image;
            $cruiseCompany->save();
        }
        return $cruiseCompany;
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseCompany $cruiseCompany)
    {
        //
        return Inertia::render('Admin/CruiseCompany/Edit',compact('cruiseCompany'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseCompany $cruiseCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseCompany $cruiseCompany)
    {
        $cruiseCompany->update([
            'name'=>$request->name,
            'tp'=>$request->tp,
            'description'=>$request->description
        ]);
        return back()->with('Successfully Inserted Cruise Company', '');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseCompany $cruiseCompany)
    {
        CruiseCompanyAgent::where('cc_id',$cruiseCompany->id)->delete();
        $cruiseCompany->delete();
        return back()->with('success', 'delete successful');
    }
}

