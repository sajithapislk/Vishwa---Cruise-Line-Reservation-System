<?php

use App\Http\Controllers\Admin\CompanyWalletController;
use App\Http\Controllers\Admin\CruiseCompanyAgentController;
use App\Http\Controllers\Admin\CruiseCompanyController;
use App\Http\Controllers\Admin\PortController;
use App\Http\Controllers\Admin\CruiseShipController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__ . '/auth/admin.php';


Route::middleware('auth:admin')->group(function () {

    Route::get('/dashboard',DashboardController::class)->name('dashboard');

    Route::resources([
        'cruise-company' => CruiseCompanyController::class,
        'cruise-company' => CruiseShipController::class,
        'cruise-company-agent' => CruiseCompanyAgentController::class,
        'company-wallet' => CompanyWalletController::class,
        'port' => PortController::class,
    ]);
});
