<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Ship::all();
        return Inertia::render('Admin/Ship/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Admin/Ship/Create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ship=Ship::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$request->img,
            'style'=>$request->style,
            'size'=>$request->size,
            'type'=>$request->type,
             'size'=>$request->size,
            'launch_at'=>$request->launch_at,
            'last_refit_at'=>$request->last_refit_at,
            'gt'=>$request->gt,
            'length'=>$request->length,
            'speed'=>$request->speed,
            'decks'=>$request->decks,
            'nop'=>$request->nop,
            'no_crew'=>$request->no_crew,
            'no_cabins'=>$request->no_cabins,
            'wa'=>$request->wa,





        ]);
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
