<?php

use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// Public Event Browsing & Booking
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('events.show');
Route::post('/event/{slug}/checkout', [EventController::class, 'checkout'])->name('events.checkout');

// Public E-Ticket Digital View & PDF
Route::get('/ticket/{code}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/ticket/{code}/pdf', [TicketController::class, 'pdf'])->name('tickets.pdf');

// Gatekeeper QR Scanner Web App (HP & Laptop Camera)
Route::get('/scanner', [ScannerController::class, 'index'])->name('scanner.index');
Route::post('/api/scan-ticket', [ScannerController::class, 'verify'])->name('api.scan-ticket');

// User & Admin Auth Routes
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminEventController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/events', [AdminEventController::class, 'storeEvent'])->name('admin.events.store');
    Route::get('/admin/events/{id}/export', [AdminEventController::class, 'exportCsv'])->name('admin.events.export');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
