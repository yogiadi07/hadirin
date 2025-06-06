<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PrintController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('anggota', AnggotaController::class)->except(['show']);

// Tampilkan daftar anggota untuk generate ID
// Tampilkan halaman Generate ID
Route::get('/anggota/generate-id', [AnggotaController::class, 'generateId'])->name('anggota.generate-id');

// Assign ID manual ke anggota tertentu
Route::post('/anggota/{anggota}/assign-id', [AnggotaController::class, 'assignId'])->name('anggota.assign-id');

// Resource untuk anggota, tanpa `show`
Route::resource('anggota', AnggotaController::class)->except(['show']);


Route::get('/scan-kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');
Route::post('/scan-kehadiran', [KehadiranController::class, 'store'])->name('kehadiran.store');

Route::get('/kehadiran/{id_anggota}', [KehadiranController::class, 'show']);
Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');


// ------------------------------------------------------------------------------------------------------------------

Route::resource('kegiatan', KegiatanController::class);

// ------------------------------------------------------------------------------------------------------------------
Route::get('/print/kehadiran-harian', [PrintController::class, 'harian'])->name('print.harian');
Route::get('/print/kehadiran-bulanan', [PrintController::class, 'bulanan'])->name('print.bulanan');
Route::get('/print/id-anggota', [PrintController::class, 'anggota'])->name('print.anggota');
