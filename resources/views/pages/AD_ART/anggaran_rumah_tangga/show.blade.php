

@include('components.header')
@include('components.sidebar')
@include('components.navbar')

    
    <!-- partial -->
    <div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <!-- Tombol Kembali -->
        <div class="mb-3">
            <button onclick="window.location.href='{{ route('anggaran_dasar.index') }}'" class="btn btn-primary">
                ← Kembali ke Daftar anggaran_dasar
            </button>
        </div>

        <!-- Header  -->
        <div class="card mb-4" style="background-image: url('{{ asset('storage/' . $anggaran_dasar->banner) }}'); background-size: cover; background-position: center;border: none; border-radius: 10px;">
            <div class="card-body d-flex flex-column justify-content-end" style="background: rgba(0, 0, 0, 0.6); height: 100%; border-radius: 10px;">
                <p class="text-muted mb-0">By: {{ $anggaran_dasar->creator->full_name ?? 'Admin' }}</p>
                <p class="text-muted">Published: {{ $anggaran_dasar->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="card" style="background-color: #2A2A2A; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <!-- Info anggaran_dasar -->
                    <div class="col-md-4">
                        <h5 class="text-muted fw-bold">Detail anggaran_dasar</h5>
                        <p class="text-white"><strong>Bulan:</strong> {{ $anggaran_dasar->bulan }}</p>
                        <p class="text-white"><strong>Jumlah:</strong> {{ $anggaran_dasar->jumlah }}</p>
                        <p class="text-white"><strong>Keterangan:</strong> {{ $anggaran_dasar->keterangan }}</p>
                    </div>
                    <!-- Deskripsi -->
                    <!-- <div class="col-md-8">
                        <h5 class="text-muted fw-bold">Deskripsi</h5>
                        <div class="text-white">
                            {!! $anggaran_dasar->deskripsi_anggaran_dasar !!}
                        </div>
                    </div> -->
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
