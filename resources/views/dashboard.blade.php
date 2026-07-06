@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h2 class="mb-4">
    <i class="bi bi-speedometer2"></i>
    Dashboard Perpustakaan
</h2>

<div class="row mb-4">

   <div class="col-md-3 mb-3">
        <div class="card border-primary">
            <div class="card-body">
                <h6 class="text-muted">Total Buku</h6>
                <h2>{{ $totalBuku }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-success">
            <div class="card-body">
                <h6 class="text-muted">Buku Tersedia</h6>
                <h2>{{ $bukuTersedia }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-danger">
            <div class="card-body">
                <h6 class="text-muted">Buku Habis</h6>
                <h2>{{ $bukuHabis }}</h2>
            </div>
        </div>
    </div>

     <div class="col-md-3 mb-3">
        <div class="card border-warning">
            <div class="card-body">
                <h6 class="text-muted">Buku Terlambat</h6>
                <h2>{{ $jumlahTerlambat }}</h2>
            </div>
        </div>
    </div>
    </div>

</div>

<div class="row mb-4">

    <div class="col-md-3 mb-3">
        <div class="card border-info">
            <div class="card-body">
                <h6 class="text-muted">Total Anggota</h6>
                <h2>{{ $totalAnggota }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card border-success">
            <div class="card-body">
                <h6 class="text-muted">Anggota Aktif</h6>
                <h2>{{ $anggotaAktif }}</h2>
            </div>
        </div>
    </div>

   <div class="col-md-3 mb-3">
        <div class="card border-secondary">
            <div class="card-body">
                <h6 class="text-muted">Anggota Nonaktif</h6>
                <h2>{{ $anggotaNonaktif }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="card">
            <div class="card-header bg-primary text-white">
                Buku Terbaru
            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Stok</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($bukuTerbaru as $buku)

                        <tr>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->stok }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="2" class="text-center">
                                Tidak ada data
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card">
            <div class="card-header bg-success text-white">
                Anggota Terbaru
            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($anggotaTerbaru as $anggota)

                        <tr>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->status }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="2" class="text-center">
                                Tidak ada data
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
         <div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-danger text-white">
                Daftar Anggota yang Terlambat
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Terlambat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($anggotaTerlambat as $transaksi)
                            <tr>
                                <td>{{ $transaksi->anggota->nama }}</td>
                                <td>{{ $transaksi->buku->judul }}</td>
                                <td>{{ $transaksi->terlambat }} hari</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    Tidak ada anggota yang terlambat
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection