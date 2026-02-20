<?php

use App\Http\Controllers\Admin\CalonMabaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DaftarUlangController as UserDaftarUlangController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\TestController as UserTestController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Route autentikasi Breeze
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/remove-photo', [ProfileController::class, 'removePhoto'])->name('profile.remove-photo');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('calon-maba', CalonMabaController::class);
    });

// User Routes
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    });

// User Test Routes
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        // Test Routes
        Route::prefix('test')
            ->name('test.')
            ->group(function () {
                Route::get('/', [UserTestController::class, 'index'])->name('index');
                Route::post('/mulai', [UserTestController::class, 'mulaiTest'])->name('mulai');
                Route::get('/ongoing/{token}', [UserTestController::class, 'ongoing'])->name('ongoing');
                Route::post('/submit/{token}', [UserTestController::class, 'submitJawaban'])->name('submit');
                Route::post('/timeout/{token}', [UserTestController::class, 'timeout'])->name('timeout');
                Route::get('/hasil', [UserTestController::class, 'hasil'])->name('hasil');
            });
    });

// User Daftar Ulang & Ambil NIM
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/daftar-ulang', [UserDaftarUlangController::class, 'index'])->name('daftar-ulang');
        Route::post('/daftar-ulang', [UserDaftarUlangController::class, 'submit'])->name('daftar-ulang.submit');
        Route::get('/ambil-nim', [UserDaftarUlangController::class, 'ambilNim'])->name('ambil-nim');
    });

require __DIR__.'/auth.php';
