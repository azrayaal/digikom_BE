

  @include('components.header')
@include('components.sidebar')
@include('components.navbar')

    
    <!-- partial -->
    <div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <!-- Tombol Kembali -->
        <div class="mb-3">
            <button onclick="window.location.href='{{ route('iuran.index') }}'" class="btn btn-primary">
                ← Kembali ke Daftar iuran
            </button>
        </div>

        <!-- Header Berita -->
        <div class="card mb-4" style="background-image: url('{{ asset('storage/' . $iuran->banner) }}'); background-size: cover; background-position: center;border: none; border-radius: 10px;">
            <div class="card-body d-flex flex-column justify-content-end" style="background: rgba(0, 0, 0, 0.6); height: 100%; border-radius: 10px;">
                <h1 class="text-white fw-bold">{{ $iuran->nama_iuran }}</h1>
                <p class="text-muted mb-0">By: {{ $iuran->creator->full_name ?? 'Admin' }}</p>
                <p class="text-muted">Published: {{ $iuran->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="card" style="background-color: #2A2A2A; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <!-- Info iuran -->
                    <div class="col-md-4">
                        <h5 class="text-muted fw-bold">Detail iuran</h5>
                        <p class="text-white"><strong>Waktu:</strong> {{ $iuran->waktu_iuran }}</p>
                        <p class="text-white"><strong>Tanggal:</strong> {{ $iuran->tanggal_iuran }}</p>
                        <p class="text-white"><strong>Lokasi:</strong> {{ $iuran->lokasi_iuran }}</p>
                    </div>
                    <!-- Deskripsi -->
                    <div class="col-md-8">
                        <h5 class="text-muted fw-bold">Deskripsi</h5>
                        <div class="text-white">
                            {!! $iuran->deskripsi_iuran !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer" style="background-color: #2A2A2A; padding: 10px 0;">
        <div class="container text-center">
            <span class="text-muted d-block text-white">Copyright © digikom.com {{ date('Y') }}</span>
            <span class="text-muted d-block text-white">All Rights Reserved</span>
        </div>
    </footer>
</div>


@include( 'components.footer')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding: 10px;
    }

    .pagination .page-item .page-link {
        color: #ffffff;
        background-color: #2A2A2A;
        border: 1px solid #D1D1D1;
        border-radius: 5px;
        margin: 0 5px;
        padding: 8px 12px;
        transition: all 0.3s ease;
    }

    .pagination .page-item .page-link:hover {
        background-color: #ffffff;
        color: #2A2A2A;
        border-color: #2A2A2A;
    }

    .pagination .page-item.active .page-link {
        background-color: #D1D1D1;
        color: #2A2A2A;
        border-color: #2A2A2A;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #E5E5E5;
        color: #A0A0A0;
    }
</style>
