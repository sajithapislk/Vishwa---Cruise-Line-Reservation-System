<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Admin\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\EmailVerificationPromptController;
use App\Http\Controllers\Admin\NewPasswordController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PasswordResetLinkController;
use App\Http\Controllers\Admin\RegisteredUserController;
use App\Http\Controllers\Admin\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {

    Route::get('login', [AuthController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {

    Route::post('logout', [AuthController::class, 'destroy'])
                ->name('logout');
});
