<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerSupporter\AuthController;

Route::middleware('guest:customer_supporter')->group(function () {

    Route::get('login', [AuthController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware('auth:customer_supporter')->group(function () {

    Route::post('logout', [AuthController::class, 'destroy'])
                ->name('logout');
});
