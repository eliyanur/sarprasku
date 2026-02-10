<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DataAlatController;
use App\Http\Controllers\User\AlatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\PetugasMiddleware;

/* ================= LANDING ================= */
Route::get('/', function () {
    return view('welcome');
});

/* ================= REDIRECT DASHBOARD ================= */
Route::get('/dashboard', function () {
    return match (auth()->user()->role) {
        'admin'    => redirect()->route('admin.dashboard'),
        'petugas'  => redirect()->route('petugas.dashboard'),
        'user'    => redirect()->route('user.dashboard'),
    };
})->middleware('auth')->name('dashboard');

/* ================= ADMIN ================= */
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', AdminMiddleware::class])
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('dashboard');
    
    // PENGGUNA
    Route::resource('alat', DataAlatController::class);

    // PENGGUNA
    Route::resource('users', UserController::class);
    // KATEGORI
        Route::get('/kategori', [KategoriController::class, 'index'])
        ->name('kategori.index');
        // form tambah kategori
    Route::get('/kategori/create', [KategoriController::class, 'create'])
        ->name('kategori.create');

    // simpan data kategori
    Route::post('/kategori/store', [KategoriController::class, 'store'])
        ->name('kategori.store');

    // form edit kategori
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])
        ->name('kategori.edit');

    // update kategori
    Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])
        ->name('kategori.update');

    // hapus kategori
    Route::delete('/kategori/{id}/delete', [KategoriController::class, 'destroy'])
        ->name('kategori.destroy');
});

/* ================= PETUGAS ================= */
Route::prefix('petugas')
    ->name('petugas.')
    ->middleware(['auth', PetugasMiddleware::class])
    ->group(function () {

        Route::get('/dashboard', [DashboardPetugasController::class, 'index'])
            ->name('dashboard');
});

/* ================= USER / PEMINJAM ================= */
Route::prefix('user')
    ->name('user.')
    ->middleware(['auth', UserMiddleware::class])
    ->group(function () {

        Route::get('/dashboard', [DashboardUserController::class, 'index'])
            ->name('dashboard');
        Route::get('/alat', [AlatController::class, 'index'])
        ->name('alat');
});

/* ================= PROFILE (SEMUA ROLE) ================= */
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::post('/logout', function () {
    Auth::logout(); // logout user
    request()->session()->invalidate(); // hapus session
    request()->session()->regenerateToken(); // regenerasi CSRF token
    return redirect('/login'); // redirect ke halaman login
})->name('logout');

require __DIR__.'/auth.php';
