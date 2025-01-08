<?php

use App\Http\Controllers\CruiseCompanyAgent\PackageController;
use App\Http\Controllers\CruiseCompanyAgent\CruiseShipController;
use App\Http\Controllers\CruiseCompanyAgent\CruiseShipRoomController;
use App\Http\Controllers\CruiseCompanyAgent\DashboardController;
use App\Http\Controllers\CruiseCompanyAgent\UpcomingReservationsController;
use App\Http\Controllers\CruiseCompanyAgent\WalletController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


require __DIR__.'/auth/cruise-company-agent.php';

Route::middleware('auth:cruise-company-agent')->group(function () {

    Route::get('/dashboard',DashboardController::class)->name('dashboard');

    Route::resources([
        'package' => PackageController::class,
        'upcoming-reservations' => UpcomingReservationsController::class,
        // 'cruise-ship-room' => CruiseLineRoomController::class,
        'cruise-ship' => CruiseShipController::class,
        'cruise-ship-room' => CruiseShipRoomController::class,
    ]);
    Route::get('/wallet',WalletController::class)->name('wallet');

    Route::get('/select-ship/{ship}',[CruiseShipRoomController::class,'select_ship'])->name('ship-room.select-ship');
    Route::get('/cruise-room-list/{cruise_id}',[CruiseShipRoomController::class,'cruiseRoom'])->name('cruise-room.list');
    Route::get('/cruise-package-list/{cruise_id}',[PackageController::class,'cruisePackage'])->name('cruise-package.list');
});
