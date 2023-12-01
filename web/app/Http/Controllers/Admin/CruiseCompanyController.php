<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseCompany;
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
        return Inertia::render('Admin/CruiseLine/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/CruiseLine/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cruiseLine = CruiseCompany::create([
            'name'=>$request->name,
            'tp'=>$request->tp,
            'description'=>$request->description,
            'img'=>''
        ]);

        if (!is_null($request->img)) {
            $image = time() . '-l' . '.' . $request->img->extension();
            $request->file('img')->storeAs('cruise-lines/', $image);

            $cruiseLine->img = $image;
            $cruiseLine->save();
        }
        return $cruiseLine;
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseCompany $cruiseLine)
    {
        //
        return Inertia::render('Admin/CruiseLine/Edit',compact('cruiseLine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseCompany $cruiseLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseCompany $cruiseLine)
    {
        $cruiseLine->update([
            'name'=>$request->name,
            'tp'=>$request->tp,
            'description'=>$request->description
        ]);

        // if (!is_null($request->img)) {
        //     $image = time() . '-l' . '.' . $request->img->extension();
        //     $request->file('img')->storeAs('cruise-lines/', $image);

        //     $cruiseLine->img = $image;
        //     $cruiseLine->save();
        // }
        return back()->with('success', 'insert successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseCompany $cruiseLine)
    {
        $cruiseLine->delete();
        return back()->with('success', 'delete successful');
    }
}

