<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CruiseCompany;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CruiseCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = CruiseCompany::all();
        return Inertia::render('Public/CruiseCompany/Index', compact('list'));
    }
    public function search(Request $request){
        $list = CruiseCompany::where('name','like','%'.$request->text.'%')->get();
        return Inertia::render('Public/CruiseCompany/Index',compact('list'));
    }


    /**
     * Display the specified resource.
     */
    public function show(CruiseCompany $cruiseCompany)
    {
        $cruiseCompany = CruiseCompany::with('ships')->find($cruiseCompany->id);

        if (!$cruiseCompany) {
            abort(404, 'Cruise company not found.');
        }

        return Inertia::render('Public/CruiseCompany/Show', compact('cruiseCompany'));
    }

    public function img($name){
        try {
            $path = "app/cruise-company/$name";
            return response()->file(storage_path($path));
        } catch (\Throwable $th) {
            return "error";
        }

    }

}
