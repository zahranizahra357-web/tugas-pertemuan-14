<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Buku
Route::resource('buku', BukuController::class);

Route::post('/buku/bulk-delete', [BukuController::class, 'bulkDelete'])
    ->name('buku.bulk-delete');

Route::get('/buku/search', [BukuController::class, 'search'])
    ->name('buku.search');

Route::get('/buku/kategori/{kategori}', [BukuController::class, 'filterKategori'])
    ->name('buku.kategori');

Route::get('/buku/export', [BukuController::class, 'export'])
    ->name('buku.export');   

// Anggota
Route::get('/anggota/export', [AnggotaController::class, 'export'])
    ->name('anggota.export');

Route::get('/anggota/search', [AnggotaController::class, 'search'])
    ->name('anggota.search');

Route::resource('anggota', AnggotaController::class);

Route::resource('anggota', AnggotaController::class);
// Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search']);