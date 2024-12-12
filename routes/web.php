<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDokterController;
use App\Http\Controllers\Admin\AdminObatController;
use App\Http\Controllers\Admin\AdminPoliController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// pasien routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/pasien/dashboard', [UserController::class, 'index'])->name('dashboard');
});

// dokter routes
Route::middleware(['auth', 'dokterMiddleware'])->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
});

// admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::controller(PasienController::class)->group(function () {
        Route::get('/admin/pasien', 'index')->name('admin.pasien');
        Route::post('/admin/pasien', 'store')->name('admin.pasien.add');
        Route::put('/admin/pasien/update/{id}', 'update')->name('admin.pasien.update');
        Route::delete('/admin/pasien/delete/{id}', 'destroy')->name('admin.pasien.destroy');
    });

    Route::controller(AdminDokterController::class)->group(function () {
        Route::get('/admin/dokter', 'index')->name('admin.dokter');
        Route::post('/admin/dokter', 'store')->name('admin.dokter.add');
        Route::put('/admin/dokter/update/{id}', 'update')->name('admin.dokter.update');
        Route::delete('/admin/dokter/delete/{id}', 'destroy')->name('admin.dokter.destroy');
    });

    Route::controller(AdminPoliController::class)->group(function () {
        Route::get('/admin/poli', 'index')->name('admin.poli');
        Route::post('/admin/poli', 'store')->name('admin.poli.add');
        Route::put('/admin/poli/update/{id}', 'update')->name('admin.poli.update');
        Route::delete('/admin/poli/delete/{id}', 'destroy')->name('admin.poli.destroy');
    });

    Route::controller(AdminObatController::class)->group(function () {
        Route::get('/admin/obat', 'index')->name('admin.obat');
        Route::post('/admin/obat', 'store')->name('admin.obat.add');
        Route::put('/admin/obat/update/{id}', 'update')->name('admin.obat.update');
        Route::delete('/admin/obat/delete/{id}', 'destroy')->name('admin.obat.destroy');
    });
});
