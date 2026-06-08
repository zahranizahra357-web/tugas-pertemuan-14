<div class="card h-100">

    <div class="card-body">

        <div class="text-center mb-3">
            <i class="bi bi-book" style="font-size: 50px;"></i>
        </div>

        <h5>{{ $buku->judul }}</h5>

        <p>
            {{ $buku->pengarang }}
        </p>

        <span class="badge bg-primary">
            {{ $buku->kategori }}
        </span>

        <hr>

        <p>
            Harga :
            {{ $buku->harga_format }}
        </p>

        <p>
            Stok :
            {{ $buku->stok }}
        </p>

        @if($buku->stok > 0)
            <span class="badge bg-success">
                Tersedia
            </span>
        @else
            <span class="badge bg-danger">
                Habis
            </span>
        @endif

    </div>

    @if($showActions)
<div class="card-footer">

    <div class="d-grid gap-2">

        <a href="{{ route('buku.show', $buku->id) }}"
           class="btn btn-info btn-sm text-white">
            Detail
        </a>

        <a href="{{ route('buku.edit', $buku->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        {{-- Delete Button dengan SweetAlert --}}
        <form action="{{ route('buku.destroy', $buku->id) }}" 
            method="POST" 
            class="d-inline delete-form">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-sm btn-danger w-100 btn-delete" 
                    data-judul="{{ $buku->judul }}">
                <i class="bi bi-trash"></i> Hapus
            </button>
        </form>
    </div>
</div>
@endif

</div>