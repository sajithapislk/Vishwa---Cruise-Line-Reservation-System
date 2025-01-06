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

}
