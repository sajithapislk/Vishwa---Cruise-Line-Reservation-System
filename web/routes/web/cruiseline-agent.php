<?php

use App\Http\Controllers\CruiseLineAgent\PackageController;
use App\Http\Controllers\CruiseLineAgent\CruiseLineController;
use App\Http\Controllers\CruiseLineAgent\CruiseLineRoomController;
use App\Http\Controllers\CruiseLineAgent\UpcomingDealController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


require __DIR__.'/auth/cruiseline-agent.php';

Route::middleware('auth:cruise-company-agent')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('CruiseCompanyAgent/Dashboard');
    })->name('dashboard');

    Route::resources([
        'package' => PackageController::class,
        'upcoming-deal' => UpcomingDealController::class,
        'ship-room' => CruiseLineRoomController::class,
        'ship' => CruiseLineController::class,
    ]);

    Route::get('/select-ship/{ship}',[CruiseLineRoomController::class,'select_ship'])->name('ship-room.select-ship');
    Route::get('/cruise-room-list/{cruise_id}',[CruiseLineRoomController::class,'cruiseRoom'])->name('cruise-room.list');
    Route::get('/cruise-package-list/{cruise_id}',[PackageController::class,'cruisePackage'])->name('cruise-package.list');
});
