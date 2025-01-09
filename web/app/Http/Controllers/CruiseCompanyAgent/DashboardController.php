<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\CruiseShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $ships = CruiseShip::where('cc_id', $user->cc_id)->pluck('id');
        $list = Book::with('reservation')->whereHas('reservation', function ($query) use ($ships) {
            return $query->whereIn('s_id', $ships);
        })->get();
        return Inertia::render('CruiseCompanyAgent/Dashboard', compact('list'));
    }
    public function filter(Request $request)
    {
        $user = Auth::user();
        $ships = CruiseShip::where('cc_id', $user->cc_id)->pluck('id');

        $query = Book::with('reservation')->whereHas('reservation', function ($reservationQuery) use ($ships, $request) {
            $reservationQuery->whereIn('s_id', $ships);

            if ($request->filled('s_id')) {
                $reservationQuery->where('s_id', $request->input('s_id'));
            }
        });
        if ($request->filled('start_date')) {
            $query->where('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->where('created_at', '<=', $request->input('end_date'));
        }

        $list = $query->get();

        return Inertia::render('CruiseCompanyAgent/Dashboard', compact('list'));
    }
    public function pdfDownload(Request $request)
    {
        $user = Auth::user();
        $ships = CruiseShip::where('cc_id', $user->cc_id)->pluck('id');

        $query = Book::with('reservation')->whereHas('reservation', function ($reservationQuery) use ($ships, $request) {
            $reservationQuery->whereIn('s_id', $ships);

            if ($request->filled('s_id')) {
                $reservationQuery->where('s_id', $request->input('s_id'));
            }
        });
        if ($request->filled('start_date')) {
            $query->where('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->where('created_at', '<=', $request->input('end_date'));
        }

        $list = $query->get();

        $pdf = Pdf::loadview('pdf.BookedList', [
            'list' => $list
        ]);
        $orientation = 'landscape';
        $customPaper = array(0, 0, 950, 950);
        $pdf->setPaper($customPaper, $orientation);
        return $pdf->stream();
    }
}
