<?php

use App\Events\NewMessage;
use App\Http\Controllers\LoginRoleCheckController;
use App\Http\Controllers\User\CruiseDealController;
use App\Http\Controllers\User\CruiseCompanyController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\LiveChatController;
use App\Http\Controllers\User\PaypalController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\CruiseShipController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\PortsController;
use App\Http\Controllers\User\RefundController;
use App\Http\Controllers\User\UpcomingReservationsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
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

require __DIR__ . '/auth/user.php';
Route::post('login-role-check', LoginRoleCheckController::class)->name('loginRole.check');
Route::get('/', WelcomeController::class)->name('welcome');

Route::controller(CruiseCompanyController::class)->group(function () {
    Route::get('/cruise-company', 'index')->name('cruise-company.index');
    Route::get('/cruise-company/search', 'search')->name('cruise-company.search');
    Route::get('/cruise-company/{cruiseCompany}', 'show')->name('cruise-company.show');
    Route::get('/cruise-company-img/{name}', 'img')->name('cruise-company.img');
});
Route::controller(PortsController::class)->group(function () {
    Route::get('/port', 'index')->name('port.index');
    Route::get('/port/search', 'search')->name('port.search');
    Route::get('/port-img/{name}', 'img')->name('port.img');
});
Route::controller(CruiseShipController::class)->group(function () {
    Route::get('/ship', 'index')->name('ship.index');
    Route::get('/ship/search', 'search')->name('ship.search');
    Route::get('/ship/{ship}', 'show')->name('ship.show');
    Route::get('/ship-img/{name}', 'img')->name('ship.img');
    Route::get('/ship-room-img/{name}', 'room_img')->name('ship.room_img');
});
Route::controller(UpcomingReservationsController::class)->group(function () {
    Route::get('/upcoming-reservations', 'index')->name('upcoming-reservations.index');
    Route::post('/upcoming-reservations', 'filter')->name('upcoming-reservations.filter');
    Route::get('/upcoming-reservations/{upcomingReservations}','show')->name('upcoming-reservations.show');

});
Route::controller(PayPalController::class)->middleware(['auth'])->group(function () {
    Route::get('process-transaction', 'processTransaction')->name('processTransaction');
    Route::get('success-transaction', 'successTransaction')->name('successTransaction');
    Route::get('cancel-transaction', 'cancelTransaction')->name('cancelTransaction');
    Route::post('/paypal/refund', 'refundTransaction')->name('paypal.refund');
});
Route::controller(CruiseDealController::class)->middleware('auth')->group(function () {
    Route::get('cruise-deal', 'index');
});
Route::post('chatbot', [LiveChatController::class,'handleUserMessage'])->name('chatbot.handle');
Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::post('chat', [LiveChatController::class,'store'])->name('chat.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('pdf/{id}', [PayPalController::class, 'pdf'])->name('paypal.pdf');
Route::get('pdf-download/{id}', [PayPalController::class, 'pdf_download'])->name('pdf_download');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('user.feedback');
Route::post('/refund', [RefundController::class, 'store'])->name('user.refund');
