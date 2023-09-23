<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseLine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseLine::all();
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
        $cruiseLine = CruiseLine::create([
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

