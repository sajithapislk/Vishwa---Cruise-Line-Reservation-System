<?php

use App\Http\Controllers\CruiseCompanyAgent\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:cruise-company-agent')->group(function () {

    Route::get('login', [AuthController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware('auth:cruise-company-agent')->group(function () {

    Route::post('logout', [AuthController::class, 'destroy'])
                ->name('logout');
});
