<?php

use App\Http\Controllers\CustomerSupporter\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


require __DIR__.'/auth/customer-supporter.php';


Route::get('/dashboard', DashboardController::class)->name('dashboard');
