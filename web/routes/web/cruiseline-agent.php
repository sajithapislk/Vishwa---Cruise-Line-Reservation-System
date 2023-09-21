<?php

use App\Http\Controllers\CruiseLineAgent\PackageController;
use App\Http\Controllers\CruiseLineAgent\ShipRoomController;
use App\Http\Controllers\CruiseLineAgent\UpcomingDealController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


require __DIR__.'/auth/cruiseline-agent.php';

Route::middleware('auth:cruise-line-agent')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('CruiseLineAgent/Dashboard');
    })->name('dashboard');

    Route::resources([
        'package' => PackageController::class,
        'upcoming-deal' => UpcomingDealController::class,
        'ship-room' => ShipRoomController::class
    ]);

    Route::get('/select-ship/{ship}',[ShipRoomController::class,'select_ship'])->name('ship-room.select-ship');
});
