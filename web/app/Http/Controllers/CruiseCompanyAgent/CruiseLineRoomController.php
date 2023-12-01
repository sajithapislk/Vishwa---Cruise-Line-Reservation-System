<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\CruiseLine;
use App\Models\CruiseLineRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseLineRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseLineRoom::all();
        return Inertia::render('CruiseCompanyAgent/CruiseLineRoom/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ships = CruiseLine::all();
        return Inertia::render('CruiseCompanyAgent/CruiseLineRoom/Select',compact('ships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        foreach ($request->all() as $key => $row) {
            $shipRoom = CruiseLineRoom::create([
                's_id'=>$row["s_id"],
                'room_view'=>$row["room_view"],
                'img'=>'',
                'room_count'=>$row["room_count"],
                'flow'=>$row["flow"],
            ]);
            if (!is_null($row["img"])) {
                $image = time() . '-sr' . '.' . $row["img"]->extension();
                $row["img"]->storeAs('ship-room/'.$shipRoom->s_id, $image);
                $shipRoom->img = $image;
                $shipRoom->save();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseLineRoom $shipRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseLineRoom $shipRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseLineRoom $shipRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseLineRoom $shipRoom)
    {
        //
    }

    function select_ship(CruiseLine $ship) {
        return Inertia::render('CruiseCompanyAgent/CruiseLineRoom/Insert',compact('ship'));
    }

    function cruiseRoom($cruise_id) {
        return CruiseLineRoom::where('s_id',$cruise_id)->get();
    }

}
