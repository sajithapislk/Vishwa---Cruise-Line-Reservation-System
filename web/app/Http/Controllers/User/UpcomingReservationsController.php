<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Package;
use App\Models\CruiseShip;
use App\Models\UpcomingReservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class UpcomingReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ships = CruiseShip::all();
        $ports = Port::all();
        $packages = Package::all();

        $upcomingDeals = UpcomingReservations::with('package', 'ship', 'arrival_port', 'departure_port', 'room', 'deals')
            ->when($request->ship_id, function ($query) use ($request) {
                return $query->where('s_id', $request->ship_id);
            })
            ->when($request->dp_id, function ($query) use ($request) {
                return $query->where('dp_id', $request->dp_id);
            })
            ->when($request->ap_id, function ($query) use ($request) {
                return $query->where('ap_id', $request->ap_id);
            })
            ->when($request->depart_at, function ($query) use ($request) {
                return $query->whereDate('depart_at', $request->depart_at);
            })
            ->when(filter_var($request->is_d, FILTER_VALIDATE_BOOLEAN), function ($query) {
                return $query->whereHas('package', function ($query) {
                    return $query->where('is_d', 1);
                });
            })
            ->when(filter_var($request->is_bl, FILTER_VALIDATE_BOOLEAN), function ($query) {
                return $query->whereHas('package', function ($query) {
                    return $query->where('is_bl', 1);
                });
            })
            ->when(filter_var($request->is_en, FILTER_VALIDATE_BOOLEAN), function ($query) {
                return $query->whereHas('package', function ($query) {
                    return $query->where('is_en', 1);
                });
            })
            ->when(filter_var($request->is_c, FILTER_VALIDATE_BOOLEAN), function ($query) {
                return $query->whereHas('package', function ($query) {
                    return $query->where('is_c', 1);
                });
            })
            ->get();

        // return $request->is_c;
        return Inertia::render('Public/UpcomingReservations/Index', compact('ships', 'ports', 'packages', 'upcomingDeals','request'));
    }


    /**
     * Display the specified resource.
     */
    public function show(UpcomingReservations $upcomingDeal)
    {
        //
    }

    public function filter(Request $request)
    {
        // dd($request);
        $list = UpcomingReservations::with('package', 'ship', 'arrival_port', 'departure_port', 'room', 'deals')
        ->when($request->ship_id, function ($query) use ($request) {
            return $query->where('s_id', $request->ship_id);
        })
        ->when($request->dp_id, function ($query) use ($request) {
            return $query->where('dp_id', $request->dp_id);
        })
        ->when($request->ap_id, function ($query) use ($request) {
            return $query->where('ap_id', $request->ap_id);
        })
        ->when($request->depart_at, function ($query) use ($request) {
            return $query->whereDate('depart_at', $request->depart_at);
        })
        ->when(filter_var($request->is_d, FILTER_VALIDATE_BOOLEAN), function ($query) {
            return $query->whereHas('package', function ($query) {
                return $query->where('is_d', 1);
            });
        })
        ->when(filter_var($request->is_bl, FILTER_VALIDATE_BOOLEAN), function ($query) {
            return $query->whereHas('package', function ($query) {
                return $query->where('is_bl', 1);
            });
        })
        ->when(filter_var($request->is_en, FILTER_VALIDATE_BOOLEAN), function ($query) {
            return $query->whereHas('package', function ($query) {
                return $query->where('is_en', 1);
            });
        })
        ->when(filter_var($request->is_c, FILTER_VALIDATE_BOOLEAN), function ($query) {
            return $query->whereHas('package', function ($query) {
                return $query->where('is_c', 1);
            });
        })
        ->get();

        return $list;
    }
}
