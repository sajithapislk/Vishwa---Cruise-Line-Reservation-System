<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CruiseShip;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseShip::all();
        return Inertia::render('Public/CruiseShip/Index', compact('list'));
    }

    public function search(Request $request){
        $list = CruiseShip::where('name','like','%'.$request->text.'%')->get();
        return Inertia::render('Public/CruiseShip/Index',compact('list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CruiseShip $ship)
    {
        $ship=$ship->with('packages')->first();
        return Inertia::render('Public/CruiseShip/Show', compact('ship'));
    }

    public function img($name){
        try {
            $path = "app/ships/$name";
            return response()->file(storage_path($path));
        } catch (\Throwable $th) {
            return "error";
        }

    }
    public function room_img($name){
        try {
            $path = "app/ship-room/$name";
            return response()->file(storage_path($path));
        } catch (\Throwable $th) {
            return "error";
        }

    }
}
