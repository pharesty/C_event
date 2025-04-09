<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VieweventController;



Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/events', [AdminController::class, 'events'])->name('events');
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    // Routes pour les actions:
    Route::post('/reservations/{id}/confirm', [AdminController::class, 'confirmReservation'])->name('reservations.confirm');
    Route::get('/reservations/{id}', [AdminController::class, 'showReservation'])->name('reservations.show');
});

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// Route for storing a new event
Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::get('/pricing', [App\Http\Controllers\PricingController::class, 'index'])->name('pricing');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/event', [App\Http\Controllers\DashboardController::class, 'index'])->name('event');
Route::get('/myevents', [App\Http\Controllers\VieweventController::class, 'index'])->name('myevents');



require __DIR__ . '/auth.php';
