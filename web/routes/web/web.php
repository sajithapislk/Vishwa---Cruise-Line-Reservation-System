<?php

use App\Events\NewMessage;
use App\Http\Controllers\CruiseLineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/a', function () {
    event(new NewMessage('abc'));
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth/user.php';


Route::controller(CruiseLineController::class)->group(function () {
    Route::get('/cruise-lines','index')->name('cruise-lines.index');
    Route::get('/cruise-lines/{cruiseLine}','show')->name('cruise-lines.show');
});

Route::controller(ShipController::class)->group(function () {
    Route::get('/ship','index')->name('cruise-lines.index');
    Route::get('/ship/{ship}','show')->name('cruise-lines.show');
});
