<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Port;
use App\Models\CruiseShip;
use App\Models\CruiseShipRoom;
use App\Models\UpcomingReservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class UpcomingReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cruiseAgent = Auth::user();
        $ships = CruiseShip::where('cc_id', $cruiseAgent->cc_id)->pluck('id');
        $list = UpcomingReservations::whereIn('s_id', $ships)->get();
        return Inertia::render('CruiseCompanyAgent/UpcomingReservations/Index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cruises = CruiseShip::all();
        $ports = Port::all();
        return Inertia::render('CruiseCompanyAgent/UpcomingReservations/Insert', compact('cruises', 'ports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $upcomingDeal = UpcomingReservations::create([
            's_id' => $request->s_id,
            'sr_id' => $request->sr_id,
            'dp_id' => $request->dp_id,
            'ap_id' => $request->ap_id,
            'p_id' => $request->p_id,
            'name' => $request->name,
            'description' => $request->description,
            'img' => '_',
            'tax' => $request->tax,
            'price' => $request->price,
            'depart_at' => $request->depart_at,
            'arrive_at' => $request->arrive_at,
        ]);
        if (!is_null($request->img)) {
            $image = time() . '-l' . '.' . $request->img->extension();
            $request->file('img')->storeAs('upcoming-reservations/', $image);

            $upcomingDeal->img = $image;
            $upcomingDeal->save();
        }

        return back()->with('success', 'successful inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(UpcomingReservations $upcomingDeal)
    {
        $ports = Port::all();
        $packages = Package::all();
        $rooms = CruiseShipRoom::all();
        return Inertia::render('CruiseCompanyAgent/UpcomingReservations/Edit', compact('upcomingDeal', 'ports', 'packages', 'rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpcomingReservations $upcomingDeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpcomingReservations $upcomingDeal)
    {
        $upcomingDeal->update([
            'sr_id' => $request->sr_id,
            'dp_id' => $request->dp_id,
            'ap_id' => $request->ap_id,
            'p_id' => $request->p_id,
            'name' => $request->name,
            'description' => $request->description,
            'img' => '_',
            'tax' => $request->tax,
            'price' => $request->price,
            'depart_at' => $request->depart_at,
            'arrive_at' => $request->arrive_at,
        ]);

        // if (!is_null($request->img)) {
        //     $image = time() . '-l' . '.' . $request->img->extension();
        //     $request->file('img')->storeAs('upcoming-reservations/', $image);

        //     $upcomingDeal->img = $image;
        //     $upcomingDeal->save();
        // }
        return back()->with('success', 'successful updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpcomingReservations $upcomingDeal)
    {
        //
    }

    public function filter(Request $request)
    {
        $cruiseAgent = Auth::user();
        $ships = CruiseShip::where('cc_id', $cruiseAgent->cc_id)->pluck('id');

        $query = UpcomingReservations::whereIn('s_id', $ships);

        if ($request->filled('start_date')) {
            $query->where('created_at', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->where('created_at', '<=', $request->input('end_date'));
        }
        if ($request->filled('s_id')) {
            $query->where('s_id', $request->input('s_id'));
        }
        if ($request->filled('name')) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->input('name')) . '%']);
        }

        $list = $query->get();

        return Inertia::render('CruiseCompanyAgent/UpcomingReservations/Index', compact('list'));
    }
    public function pdfDownload(Request $request) {
        $cruiseAgent = Auth::user();
        $ships = CruiseShip::where('cc_id', $cruiseAgent->cc_id)->pluck('id');

        $query = UpcomingReservations::whereIn('s_id', $ships);

        if ($request->filled('start_date')) {
            $query->where('created_at', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
            $query->where('created_at', '<=', $request->input('end_date'));
        }
        if ($request->filled('s_id')) {
            $query->where('s_id', $request->input('s_id'));
        }
        if ($request->filled('name')) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->input('name')) . '%']);
        }

        $list = $query->get();

        $pdf = Pdf::loadview('pdf.UpcomingReservationList', [
            'list' => $list
        ]);
        $orientation = 'landscape';
        $customPaper = array(0, 0, 950, 950);
        $pdf->setPaper($customPaper, $orientation);
        return $pdf->stream();
    }
}
