<?php

namespace App\Http\Controllers\CruiseLineAgent;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use App\Models\UpcomingDeal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UpcomingDealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = UpcomingDeal::all();
        return Inertia::render('CruiseLineAgent/UpcomingDeal/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CruiseLineAgent/UpcomingDeal/Insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UpcomingDeal $upcomingDeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpcomingDeal $upcomingDeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpcomingDeal $upcomingDeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpcomingDeal $upcomingDeal)
    {
        //
    }
}
