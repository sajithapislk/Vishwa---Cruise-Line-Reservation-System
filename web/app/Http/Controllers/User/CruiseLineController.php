<?php

namespace App\Http\Controllers\User;

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
        $ships = CruiseLine::all();
        return Inertia::render('Public/CruiseLine/Index', compact('ships'));
    }


    /**
     * Display the specified resource.
     */
    public function show(CruiseLine $ship)
    {
        $ship=$ship->with('packages')->first();
        return Inertia::render('Public/CruiseLine/Show', compact('ship'));
    }

    public function img($name){
        try {
            $path = "app/ships/$name";
            return response()->file(storage_path($path));
        } catch (\Throwable $th) {
            return "error";
        }

    }
}
