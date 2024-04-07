<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WalletController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('CruiseCompanyAgent/Wallet');
    }
}
