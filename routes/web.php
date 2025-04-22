<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthFormController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusViewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageBookingController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BusController;

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthFormController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthFormController::class, 'showRegisterForm'])->name('register');
    
    Route::post('/web-login', [AuthFormController::class, 'login'])->name('web.login');
    Route::post('/web-register', [AuthFormController::class, 'register'])->name('web.register');
});

// Logout route (requires auth)
Route::middleware('auth')->get('/logout', [AuthFormController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthFormController::class, 'logout'])->name('logout');

// Public Booking Routes (no auth required)
Route::get('/', [BookingController::class, 'index'])->name('seats_view.index');
Route::post('/book', [BookingController::class, 'book'])->name('seats.book');
Route::get('/booked-seats', [BookingController::class, 'bookedSeats'])->name('seats.booked');
Route::get('/verify/{ticket_number}', [BookingController::class, 'verify'])->name('tickets.verify');

// Public Bus View Routes
Route::get('/buses_view', [BusViewController::class, 'index'])->name('buses_view.index');
Route::get('/buses_view/{id}', [BusViewController::class, 'show'])->name('buses_view.show');

// Authenticated-only Dashboard & Admin Panels
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Booking Management
    Route::prefix('admin')->group(function () {
        Route::get('bookings', [ManageBookingController::class, 'index'])->name('manage-bookings.index');
        Route::get('bookings/{booking}', [ManageBookingController::class, 'show'])->name('manage-bookings.show');
        Route::delete('bookings/{booking}', [ManageBookingController::class, 'destroy'])->name('manage-bookings.destroy');
        Route::patch('bookings/{booking}/status', [ManageBookingController::class, 'updateStatus'])->name('manage-bookings.status');
    });

    // Admin Bus & Seat Management
    Route::resource('buses', BusController::class);
    Route::resource('seats', SeatController::class);
});
