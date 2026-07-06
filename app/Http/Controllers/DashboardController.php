<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik buku
        $totalBuku = Buku::count();
        $bukuTersedia = Buku::where('stok', '>', 0)->count();
        $bukuHabis = Buku::where('stok', 0)->count();

        // Statistik anggota
        $totalAnggota = Anggota::count();
        $anggotaAktif = Anggota::where('status', 'Aktif')->count();
        $anggotaNonaktif = Anggota::where('status', 'Nonaktif')->count();

        // Data terbaru
        $bukuTerbaru = Buku::latest()->take(5)->get();
        $anggotaTerbaru = Anggota::latest()->take(5)->get();

        $jumlahTerlambat = Transaksi::where('status', 'Dipinjam')
        ->whereDate('tanggal_kembali', '<', now())
        ->count();

        $anggotaTerlambat = Transaksi::with(['anggota', 'buku'])
        ->where('status', 'Dipinjam')
        ->whereDate('tanggal_kembali', '<', now())
        ->get();

        // Statistik tambahan
        $totalTransaksi = Transaksi::count();

        $sedangDipinjam = Transaksi::where('status', 'Dipinjam')->count();

        $dendaBulanIni = Transaksi::whereMonth('tanggal_dikembalikan', now()->month)
            ->sum('denda');

        $transaksiHariIni = Transaksi::whereDate('tanggal_pinjam', today())->count();

        return view('dashboard', compact(
            'totalBuku',
            'bukuTersedia',
            'bukuHabis',
            'totalAnggota',
            'anggotaAktif',
            'anggotaNonaktif',
            'bukuTerbaru',
            'anggotaTerbaru',
            'jumlahTerlambat',
            'anggotaTerlambat',

            // Statistik tambahan
            'totalTransaksi',
            'sedangDipinjam',
            'dendaBulanIni',
            'transaksiHariIni',
        ));
    }
}