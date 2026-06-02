@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-book"></i>
        Daftar Buku
    </h1>

    <a href="{{ route('buku.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Buku
    </a>
</div>

<form action="{{ route('buku.search') }}" method="GET" class="mb-4">

    <div class="row">

        <div class="col-md-3">
            <input type="text"
                   name="keyword"
                   class="form-control"
                   placeholder="Cari judul, pengarang, penerbit">
        </div>

        <div class="col-md-2">
            <select name="kategori" class="form-control">
                <option value="">Semua Kategori</option>
                <option value="Programming">Programming</option>
                <option value="Database">Database</option>
                <option value="Networking">Networking</option>
                <option value="Web Design">Web Design</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="tahun" class="form-control">
                <option value="">Semua Tahun</option>

                @for($tahun = date('Y'); $tahun >= 2015; $tahun--)
                    <option value="{{ $tahun }}">
                        {{ $tahun }}
                    </option>
                @endfor

            </select>
        </div>

        <div class="col-md-2">
            <select name="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="tersedia">Tersedia</option>
                <option value="habis">Habis</option>
            </select>
        </div>

        <div class="col-md-3">
            <button type="submit" class="btn btn-success">
                Cari
            </button>

            <a href="{{ route('buku.index') }}"
               class="btn btn-secondary">
                Reset
            </a>
        </div>

    </div>

</form>

{{-- Statistik --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <h6>Total Buku</h6>
                <h2>{{ $totalBuku }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <h6>Buku Tersedia</h6>
                <h2>{{ $bukuTersedia }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <h6>Buku Habis</h6>
                <h2>{{ $bukuHabis }}</h2>
            </div>
        </div>
    </div>
</div>

{{-- Daftar Buku --}}
<div class="row">

    @forelse($bukus as $buku)

        <div class="col-md-4 mb-4">
            <x-buku-card :buku="$buku" />
        </div>

    @empty

        <div class="col-12">
            <div class="alert alert-warning">
                Tidak ada data buku.
            </div>
        </div>

    @endforelse

</div>

@endsection