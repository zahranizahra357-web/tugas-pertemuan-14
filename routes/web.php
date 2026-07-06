<?php
 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
 
// Public routes (tanpa auth)
Route::get('/', function () {
    return redirect()->route('login');
});
 
// Protected routes (dengan auth middleware)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
    // Buku - CRUD
    Route::resource('buku', BukuController::class);

    Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
    Route::post('/buku/bulk-delete', [BukuController::class, 'bulkDelete'])->name('buku.bulk-delete');
    Route::get('/buku/export', [BukuController::class, 'export'])->name('buku.export');

    // Anggota - CRUD
    Route::resource('anggota', AnggotaController::class);

    // Search Anggota
    Route::get('/anggota/search', [AnggotaController::class, 'search'])
    ->name('anggota.search');


    // Export Anggota
    Route::get('/anggota/export', [AnggotaController::class, 'export'])
    ->name('anggota.export');

    // Transaksi - Custom routes
    Route::get('/transaksi/laporan',
    [TransaksiController::class, 'laporan'])
    ->name('transaksi.laporan');

    Route::get('/transaksi/laporan/pdf',
    [TransaksiController::class, 'exportPdf'])
    ->name('transaksi.laporan.pdf');

    Route::put('/transaksi/{id}/kembalikan',
    [TransaksiController::class, 'kembalikan'])
    ->name('transaksi.kembalikan');

    // Transaksi - CRUD
    Route::resource('transaksi', TransaksiController::class);
});
 
require __DIR__.'/auth.php';