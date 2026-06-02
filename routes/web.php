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

Route::get('/buku/search', [BukuController::class, 'search'])
    ->name('buku.search');

Route::get('/buku/kategori/{kategori}', [BukuController::class, 'filterKategori'])
    ->name('buku.kategori');

// Anggota
Route::resource('anggota', AnggotaController::class);

// Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search']);