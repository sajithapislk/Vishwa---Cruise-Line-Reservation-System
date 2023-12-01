<?php

use App\Http\Controllers\Admin\CompanyWalletController;
use App\Http\Controllers\Admin\CruiseCompanyAgentController;
use App\Http\Controllers\Admin\CruiseCompanyController;
use App\Http\Controllers\Admin\PortController;
use App\Http\Controllers\Admin\CruiseLineController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__ . '/auth/admin.php';


Route::middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::resources([
        'cruise-line' => CruiseCompanyController::class,
        'ship' => CruiseLineController::class,
        'cruise-line-agent' => CruiseCompanyAgentController::class,
        'company-wallet' => CompanyWalletController::class,
        'port' => PortController::class,
    ]);
});
