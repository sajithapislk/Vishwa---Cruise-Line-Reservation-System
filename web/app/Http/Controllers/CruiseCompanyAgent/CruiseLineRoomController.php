<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\CruiseShip;
use App\Models\CruiseShipRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CruiseLineRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseShipRoom::all();
        return Inertia::render('CruiseCompanyAgent/CruiseShipRoom/Index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::User();
        $ship = CruiseShip::where('cc_id',$user->cc_id)->first();
        return Inertia::render('CruiseCompanyAgent/CruiseShipRoom/Insert',compact('ship'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        foreach ($request->all() as $key => $row) {
            $shipRoom = CruiseShipRoom::create([
                's_id'=>$row["s_id"],
                'room_view'=>$row["room_view"],
                'img'=>'',
                'room_count'=>$row["room_count"],
            ]);
            if (!is_null($row["img"])) {
                $image = time() . '-sr' . '.' . $row["img"]->extension();
                $row["img"]->storeAs('ship-room', $image);
                $shipRoom->img = $image;
                $shipRoom->save();
            }
        }

        return back()->with('success','room insert successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseShipRoom $shipRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CruiseShipRoom $shipRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseShipRoom $shipRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseShipRoom $shipRoom)
    {
        //
    }

    function select_ship(CruiseShip $ship) {
        return Inertia::render('CruiseCompanyAgent/CruiseShipRoom/Insert',compact('ship'));
    }

    function cruiseRoom($cruise_id) {
        return CruiseShipRoom::where('s_id',$cruise_id)->get();
    }

}
