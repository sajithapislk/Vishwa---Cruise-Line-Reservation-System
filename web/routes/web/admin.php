<?php

use App\Http\Controllers\Admin\CruiseLineAgentController;
use App\Http\Controllers\Admin\CruiseLineController;
use App\Http\Controllers\Admin\ShipController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__ . '/auth/admin.php';


Route::middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::resources([
        'cruise-line' => CruiseLineController::class,
        'ship' => ShipController::class,
        'cruise-line-agent' => CruiseLineAgentController::class,
    ]);
});
