<?php

use App\Events\NewMessage;
use App\Http\Controllers\User\CruiseLineController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PaypalController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ShipController;
use App\Http\Controllers\User\UpcomingDealController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth/user.php';

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::controller(CruiseLineController::class)->group(function () {
    Route::get('/cruise-lines','index')->name('cruise-lines.index');
    Route::get('/cruise-lines/{cruiseLine}','show')->name('cruise-lines.show');
});
Route::controller(ShipController::class)->group(function () {
    Route::get('/ship','index')->name('ship.index');
    Route::get('/ship/{ship}','show')->name('ship.show');
});
Route::controller(UpcomingDealController::class)->group(function () {
    Route::get('/upcoming-deal','index')->name('upcoming-deal.index');
    Route::get('/upcoming-deal/{upcomingDeal}','show')->name('upcoming-deal.show');
});

Route::post('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
