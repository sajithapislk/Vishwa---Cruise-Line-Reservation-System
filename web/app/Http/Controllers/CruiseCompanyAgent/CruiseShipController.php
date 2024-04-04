<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\CruiseCompany;
use App\Models\CruiseShip;
use App\Models\CruiseShipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CruiseShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseShip::all();
        // return $list;
        return Inertia::render('CruiseCompanyAgent/CruiseShip/Index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shipTypes = CruiseShipType::all();
        // return $shipTypes;
        return Inertia::render('CruiseCompanyAgent/CruiseShip/Create',compact('shipTypes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cruiseAgent = Auth::user();
        $ship = CruiseShip::create([
            'cc_id' => $cruiseAgent->cc_id,
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
            $request->file('img')->storeAs('cruise-company/', $image);

            $ship->img = $image;
            $ship->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseShip $ship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseShip $ship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseShip $ship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseShip $ship)
    {
        //
    }
}
