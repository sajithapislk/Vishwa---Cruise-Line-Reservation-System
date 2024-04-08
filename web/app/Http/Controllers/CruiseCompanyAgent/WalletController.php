<?php

namespace App\Http\Controllers\CruiseCompanyAgent;

use App\Http\Controllers\Controller;
use App\Models\CruiseCompanyWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WalletController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        $list = CruiseCompanyWallet::where('cc_id',$user->cc_id)->get();
        return Inertia::render('CruiseCompanyAgent/Wallet',compact('list'));
    }
}
