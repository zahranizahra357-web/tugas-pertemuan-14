@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')

<div class="container">

    <h2 class="mb-4">
        <i class="bi bi-file-earmark-text"></i>
        Laporan Transaksi
    </h2>

    <div class="card mb-4">
        <div class="card-body">

            <form method="GET" action="{{ route('transaksi.laporan') }}">

                <div class="row">

                    <div class="col-md-3">
                        <label>Tanggal Dari</label>
                        <input type="date"
                               name="tanggal_dari"
                               class="form-control"
                               value="{{ request('tanggal_dari') }}">
                    </div>

                    <div class="col-md-3">
                        <label>Tanggal Sampai</label>
                        <input type="date"
                               name="tanggal_sampai"
                               class="form-control"
                               value="{{ request('tanggal_sampai') }}">
                    </div>

                    <div class="col-md-2">
                        <label>Status</label>

                        <select name="status" class="form-control">

                            <option value="">Semua</option>

                            <option value="Dipinjam"
                                {{ request('status')=='Dipinjam' ? 'selected':'' }}>
                                Dipinjam
                            </option>

                            <option value="Dikembalikan"
                                {{ request('status')=='Dikembalikan' ? 'selected':'' }}>
                                Dikembalikan
                            </option>

                        </select>

                    </div>

                    <div class="col-md-2">

                        <label>Anggota</label>

                        <select name="anggota_id" class="form-control">

                            <option value="">Semua</option>

                            @foreach($anggotas as $anggota)

                                <option value="{{ $anggota->id }}"
                                    {{ request('anggota_id')==$anggota->id ? 'selected':'' }}>
                                    {{ $anggota->nama }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-funnel"></i> Filter
                        </button>

                        <a href="{{ route('transaksi.laporan.pdf') }}"
                           class="btn btn-danger">
                            <i class="bi bi-file-earmark-pdf"></i> PDF
                        </a>

                    </div>

                </div>

            </form>

        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-6">

            <div class="alert alert-info">
                <strong>Total Transaksi :</strong>
                {{ $totalTransaksi }}
            </div>

        </div>

        <div class="col-md-6">

            <div class="alert alert-warning">
                <strong>Total Denda :</strong>
                Rp {{ number_format($totalDenda,0,',','.') }}
            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Kode</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transaksis as $transaksi)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $transaksi->kode_transaksi }}</td>

                        <td>{{ $transaksi->anggota->nama }}</td>

                        <td>{{ $transaksi->buku->judul }}</td>

                        <td>
                            {{ $transaksi->tanggal_pinjam->format('d M Y') }}
                        </td>

                        <td>
                            {{ $transaksi->tanggal_kembali->format('d M Y') }}
                        </td>

                        <td>
                            @if($transaksi->status == 'Dipinjam')
                                <span class="badge bg-warning text-dark">
                                    Dipinjam
                                </span>
                            @else
                                <span class="badge bg-success">
                                    Dikembalikan
                                </span>
                            @endif
                        </td>

                        <td>
                            Rp {{ number_format($transaksi->denda,0,',','.') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8" class="text-center">
                            Tidak ada data
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection