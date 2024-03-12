<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResereveController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider and all of them will
| Here is where you can register web routes for your application. These
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('ban.check')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/search', SearchController::class)->name('search');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('role:admin,organizer');

        Route::resource('users', UserController::class)->only(['index', 'update'])->middleware('role:admin');
        Route::resource('categories', CategoryController::class)->middleware('role:admin,organizer');
        Route::resource('events', EventController::class)->except('show')->middleware('role:admin,organizer');

        Route::post('/reservations/{event}', [ReservationController::class, "store"])->name('reservations.store');
        Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index')->middleware('role:admin,organizer');
        Route::put('/reservations/edit/{reservation}', [ReservationController::class, "edit"])->name('reservations.edit')->middleware('role:organizer');
        Route::post('/reservations/accepteAll', [ReservationController::class, "accepteAll"])->name('reservations.accepteAll')->middleware('role:admin,organizer');
        Route::post('/download-ticket/{event}', [TicketController::class, 'download'])->name('download.ticket');
        Route::get('/checkout/{id}', function ($id) {
            return PaymentController::checkout($id);
        })->name("checkout");
        Route::get('/success', [PaymentController::class, 'success'])->name('success');
        Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
    });
    Route::get('events/{event}', [EventController::class, 'show'])->name('events.show');
});
require __DIR__ . '/auth.php';
