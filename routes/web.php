<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ApprovalController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('order', function () {
    return Inertia::render('Order');
})->middleware(['auth', 'verified'])->name('order');
Route::get('vehicle', function () {
    return Inertia::render('Vehicle');
})->middleware(['auth', 'verified'])->name('vehicle');
Route::get('user', function () {
    return Inertia::render('User');
})->middleware(['auth', 'verified'])->name('user');
Route::get('order-form', function () {
    return Inertia::render('Order-form');
})->middleware(['auth', 'verified'])->name('order-form');


Route::post('/order', [PemesananController::class, 'store'])->name('order.store');
Route::get('/order-form', [PemesananController::class, 'create'])->name('order.create');
Route::get('/order', [PemesananController::class, 'index'])->name('order.index');

Route::get('/vehicle', [KendaraanController::class, 'create'])->name('vehicle.create');

Route::post('/approvals/{id}/action', [ApprovalController::class, 'approve'])->name('approval.action');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
