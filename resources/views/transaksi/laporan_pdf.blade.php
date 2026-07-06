<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        h2{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:8px;
            text-align:left;
        }

    </style>

</head>

<body>

<h2>LAPORAN TRANSAKSI PERPUSTAKAAN</h2>

<p>Total Transaksi : {{ $totalTransaksi }}</p>
<p>Total Denda : Rp {{ number_format($totalDenda,0,',','.') }}</p>

<table>

    <thead>

        <tr>

            <th>No</th>
            <th>Kode</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
            <th>Denda</th>

        </tr>

    </thead>

    <tbody>

        @foreach($transaksis as $transaksi)

        <tr>

            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaksi->kode_transaksi }}</td>
            <td>{{ $transaksi->anggota->nama }}</td>
            <td>{{ $transaksi->buku->judul }}</td>
            <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
            <td>{{ $transaksi->status }}</td>
            <td>Rp {{ number_format($transaksi->denda,0,',','.') }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>

</html>