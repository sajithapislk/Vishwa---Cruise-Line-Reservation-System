<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyWallet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyWalletController extends Controller
{
    public function index() {

        $list = CompanyWallet::all();
        return Inertia::render('Admin/CompanyWallet',compact('list'));

    }
}
