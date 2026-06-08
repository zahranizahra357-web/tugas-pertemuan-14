@extends('layouts.app')

@section('title', $buku->judul)

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning">
            <h4>Detail Buku</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="200">Kode Buku</th>
                    <td>{{ $buku->kode_buku }}</td>
                </tr>

                <tr>
                    <th>Judul</th>
                    <td>{{ $buku->judul }}</td>
                </tr>

                <tr>
                    <th>Kategori</th>
                    <td>{{ $buku->kategori }}</td>
                </tr>

                <tr>
                    <th>Pengarang</th>
                    <td>{{ $buku->pengarang }}</td>
                </tr>

                <tr>
                    <th>Penerbit</th>
                    <td>{{ $buku->penerbit }}</td>
                </tr>

                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>

                <tr>
                    <th>ISBN</th>
                    <td>{{ $buku->isbn }}</td>
                </tr>

                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                </tr>

                <tr>
                    <th>Stok</th>
                    <td>{{ $buku->stok }}</td>
                </tr>

                <tr>
                    <th>Bahasa</th>
                    <td>{{ $buku->bahasa }}</td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $buku->deskripsi }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('buku.edit', $buku->id) }}"
                   class="btn btn-warning">
                    Edit Buku
                </a>

                <a href="{{ route('buku.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>

            <hr>

            <small class="text-muted">
                Dibuat:
                {{ $buku->created_at }}

                <br>

                Terakhir Update:
                {{ $buku->updated_at }}
            </small>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // SweetAlert confirmation untuk delete
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            const judul = this.getAttribute('data-judul');
            
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: `Apakah Anda yakin ingin menghapus buku "${judul}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush

@push('scripts')
<script>
    // Loading state saat submit form
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && !this.classList.contains('delete-form')) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            }
        });
    });
</script>
@endpush