<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data buku dari database
        $bukus = Buku::latest()->get();

        // Statistik untuk card
        $totalBuku = Buku::count();
        $bukuTersedia = Buku::where('stok', '>', 0)->count();
        $bukuHabis = Buku::where('stok', 0)->count();

        // Return view dengan data
        return view('buku.index', compact(
            'bukus',
            'totalBuku',
            'bukuTersedia',
            'bukuHabis'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
{
    try {
        // Create buku baru dengan validated data
        Buku::create($request->validated());

        // Redirect dengan success message
        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil ditambahkan!');

    } catch (\Exception $e) {
        // Redirect dengan error message jika gagal
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Gagal menambahkan buku: ' . $e->getMessage());
    }
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, string $id)
{
    try {

        $buku = Buku::findOrFail($id);

        $buku->update($request->validated());

        return redirect()
                ->route('buku.show', $buku->id)
                ->with('success', 'Buku berhasil diperbarui!');

    } catch (\Exception $e) {

        return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui buku: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {

        $buku = Buku::findOrFail($id);

        $judul = $buku->judul;

        $buku->delete();

        return redirect()
                ->route('buku.index')
                ->with('success', "Buku '{$judul}' berhasil dihapus!");

    } catch (\Exception $e) {

        return redirect()
                ->back()
                ->with('error', 'Gagal menghapus buku: ' . $e->getMessage());
    }
}

    /**
     * Filter buku berdasarkan kategori.
     */
    public function filterKategori($kategori)
    {
        $bukus = Buku::where('kategori', $kategori)->latest()->get();

        $totalBuku = $bukus->count();
        $bukuTersedia = $bukus->where('stok', '>', 0)->count();
        $bukuHabis = $bukus->where('stok', 0)->count();

        return view('buku.index', compact(
            'bukus',
            'totalBuku',
            'bukuTersedia',
            'bukuHabis',
            'kategori'
        ));
    }

    /**
     * Pencarian dan filter buku
     */
    public function search(Request $request)
    {
        $query = Buku::query();

        // Pencarian keyword
        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->keyword . '%')
                  ->orWhere('pengarang', 'like', '%' . $request->keyword . '%')
                  ->orWhere('penerbit', 'like', '%' . $request->keyword . '%');
            });
        }

        // Filter kategori
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        // Filter tahun terbit
        if ($request->tahun) {
            $query->where('tahun_terbit', $request->tahun);
        }

        // Filter ketersediaan
        if ($request->status == 'tersedia') {
            $query->where('stok', '>', 0);
        }

        if ($request->status == 'habis') {
            $query->where('stok', 0);
        }

        $bukus = $query->latest()->get();

        $totalBuku = $bukus->count();
        $bukuTersedia = $bukus->where('stok', '>', 0)->count();
        $bukuHabis = $bukus->where('stok', 0)->count();

        return view('buku.index', compact(
            'bukus',
            'totalBuku',
            'bukuTersedia',
            'bukuHabis'
        ));
    }

            public function bulkDelete(Request $request)
        {
            $ids = $request->buku_ids;

            Buku::whereIn('id', $ids)->delete();

            return redirect()
                ->route('buku.index')
                ->with('success', count($ids) . ' buku berhasil dihapus!');
        }
}