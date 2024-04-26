<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Port;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Port::all();
        return Inertia::render('Admin/Port/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Admin/Port/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // imge store doesnt have code
        $ports = Port::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>'',
        ]);

        if (!is_null($request->img)) {
            $image = time() . '-l' . '.' . $request->img->extension();
            $request->file('img')->storeAs('port/', $image);

            $ports->img = $image;
            $ports->save();
        }
        return back()->with('success',' Port Added');
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
        $port->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);

        if (!is_null($request->img)) {
            $image = time() . '-l' . '.' . $request->img->extension();
            $request->file('img')->storeAs('cruise-company/', $image);

            $port->img = $image;
            $port->save();
        }

        return back()->with('success','update port');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Port $port)
    {
        $port->delete();
        return back()->with('success','delete port');
    }
}
