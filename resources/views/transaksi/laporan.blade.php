@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Laporan Transaksi</h3>

    <h3>Laporan Transaksi</h3>

<form method="GET" action="{{ route('transaksi.laporan') }}">
    <div class="row">

        <div class="col-md-3">
            <label>Dari Tanggal</label>
            <input type="date"
                   name="tanggal_dari"
                   class="form-control"
                   value="{{ request('tanggal_dari') }}">
        </div>

        <div class="col-md-3">
            <label>Sampai Tanggal</label>
            <input type="date"
                   name="tanggal_sampai"
                   class="form-control"
                   value="{{ request('tanggal_sampai') }}">
        </div>

        <div class="col-md-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">Semua</option>
                <option value="Dipinjam"
                    {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>
                    Dipinjam
                </option>
                <option value="Dikembalikan"
                    {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>
                    Dikembalikan
                </option>
            </select>
        </div>

        <div class="col-md-3">
            <label>Anggota</label>
            <select name="anggota_id" class="form-control">
                <option value="">Semua</option>

                @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->id }}"
                        {{ request('anggota_id') == $anggota->id ? 'selected' : '' }}>
                        {{ $anggota->nama }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <br>

    <button type="submit" class="btn btn-primary">
        Filter
    </button>
</form>

<hr>

<p>Total Transaksi: {{ $totalTransaksi }}</p>
<p>Total Denda: Rp {{ number_format($totalDenda) }}</p>
</div>
@endsection