<?php

use App\Http\Controllers\CustomerSupporter\DashboardController;
use App\Http\Controllers\CustomerSupporter\LiveChatController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


require __DIR__.'/auth/customer-supporter.php';

Route::middleware('auth:customer-supporter')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::controller(LiveChatController::class)->group(function () {
        Route::get('chat/{id}', 'index')->name('chat');
    });
});
