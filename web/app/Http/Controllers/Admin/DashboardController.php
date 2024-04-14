<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $list = Book::with('payment','user','reservation')->get();

        $booksWithPayments = Book::where('status', 'SUCCESS')
            ->with('payment')
            ->get();

        $paymentSummary = $booksWithPayments->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d');
        })->map(function ($group) {
            return [
                'total_amount' => $group->sum(function ($book) {
                    return $book->payment->amount;
                }),
                'count' =>  $group->count(),
                'date' => $group->first()->payment->created_at->format('Y-m-d')
            ];
        })->values();

        // return $list;

        return Inertia::render('Admin/Dashboard', compact('list','paymentSummary'));
    }
}
