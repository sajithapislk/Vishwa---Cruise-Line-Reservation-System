<?php

use App\Http\Controllers\CruiseAgent\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:cruiseline_agent')->group(function () {

    Route::get('login', [AuthController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware('auth:cruiseline_agent')->group(function () {

    Route::post('logout', [AuthController::class, 'destroy'])
                ->name('logout');
});
