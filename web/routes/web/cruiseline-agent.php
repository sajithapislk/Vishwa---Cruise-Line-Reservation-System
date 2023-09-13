<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


require __DIR__.'/auth/cruiseline-agent.php';

Route::middleware('auth:cruiseline_agent')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::resources([
        'cruise-line' => CruiseLineController::class,
        'ship' => ShipController::class,
    ]);
});
