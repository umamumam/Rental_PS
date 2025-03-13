<?php

use App\Models\Game;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;

// Landing Page (Mengganti welcome.blade.php)
Route::get('/', function () {
    $games = Game::all();
    return view('landing', compact('games'));
})->name('landing');
// Route::get('/', function () {
//     return view('awal');
// });

// Halaman Dashboard (Admin)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/bookings/{id}/edit', [DashboardController::class, 'edit'])->name('bookings.edit');
    Route::put('/dashboard/bookings/{id}', [DashboardController::class, 'update'])->name('bookings.update');
    Route::patch('/dashboard/bookings/{id}/status', [DashboardController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::delete('/dashboard/bookings/{id}', [DashboardController::class, 'destroy'])->name('bookings.destroy');
    Route::resource('services', ServiceController::class);
    Route::get('/home', [DashboardController::class, 'home'])->name('home');
});
// Route::patch('/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus')->middleware('auth');
Route::get('/calendar', [BookingController::class, 'calendar'])->name('calendar');
Route::get('/tgl', [DashboardController::class, 'calendar'])->name('calendar');

Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/histori', [BookingController::class, 'myBookings'])->name('booking.history');
Route::resource('games', GameController::class);

// Booking (Tanpa Auth)
Route::post('/book', [BookingController::class, 'store'])->name('book');
Route::post('/payment/process', [BookingController::class, 'processPayment'])->name('payment.process');
Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/{id}/invoice', [BookingController::class, 'downloadInvoice'])->name('booking.invoice');

// Profil User (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Load Routes Auth (Dari Breeze)
require __DIR__ . '/auth.php';
