<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/notes', [DashboardController::class, 'notes'])->name('dashboard.notes');
    Route::post('/dashboard/notes', [DashboardController::class, 'createNotes'])->name('dashboard.notes.store');
    Route::get('/dashboard/notes/{id}', [DashboardController::class, 'viewNotes'])->name('dashboard.notes.view');
    Route::get('/dashboard/notes/delete/{id}', [DashboardController::class, 'deleteNotes'])->name('dashboard.notes.destroy');

    Route::get('/dashboard/gaji', [DashboardController::class, 'gaji'])->name('dashboard.gaji');
    Route::get('/dashboard/gaji/{id}', [DashboardController::class, 'gajiKaryawan'])->name('dashboard.gaji.karyawan');
    Route::post('/dashboard/gaji/all', [DashboardController::class, 'gajiSemua'])->name('dashboard.gaji.all');
    
    Route::get('/dashboard/karyawan', [DashboardController::class, 'karyawan'])->name('dashboard.karyawan');
    Route::get('/dashboard/karyawan/add', [DashboardController::class, 'add'])->name('dashboard.karyawan.add');
    Route::post('/dashboard/karyawan/add', [DashboardController::class, 'create'])->name('dashboard.karyawan.store');
    Route::get('/dashboard/karyawan/{id}', [DashboardController::class, 'delete'])->name('dashboard.karyawan.delete');
    Route::get('/dashboard/karyawan/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.karyawan.edit');
    Route::put('/dashboard/karyawan/{id}/edit', [DashboardController::class, 'update'])->name('dashboard.karyawan.update');

    Route::get('/dashboard/laporan', [DashboardController::class, 'laporan'])->name('dashboard.laporan');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
