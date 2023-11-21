<?php

namespace App\Http\Controllers\CruiseLineAgent;

use App\Http\Controllers\Controller;
use App\Models\CruiseLine;
use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Ship::all();
        // return $list;
        return Inertia::render('CruiseLineAgent/Ship/Index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cruiseAgent = Auth::user();
        $cruiseLines = CruiseLine::where('id',$cruiseAgent->cl_id)->get();
        return Inertia::render('CruiseLineAgent/Ship/Create',compact('cruiseLines'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ship = Ship::create([
            'cl_id' => $request->cl_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'description' => $request->description,
            'img' => '',
            'style' => $request->style,
            'size' => $request->size,
            'type' => $request->type,
            'launch_at' => $request->launch_at,
            'last_refit_at' => $request->last_refit_at,
            'gt' => $request->gt,
            'length' => $request->length,
            'width' => $request->width,
            'speed' => $request->speed,
            'decks' => $request->decks,
            'nop' => $request->nop,
            'no_crew' => $request->no_crew,
            'no_cabins' => $request->no_cabins,
            'wa' => $request->wa
        ]);

        if (!is_null($request->img)) {
            $image = time() . '-l' . '.' . $request->img->extension();
            $request->file('img')->storeAs('cruise-lines/', $image);

            $ship->img = $image;
            $ship->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ship $ship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ship $ship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ship $ship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ship $ship)
    {
        //
    }
}
