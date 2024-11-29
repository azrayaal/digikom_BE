

@include('components.header')
@include('components.sidebar')
@include('components.navbar')

    
    <!-- partial -->
    <div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <!-- Tombol Kembali -->
        <div class="mb-3">
            <button onclick="window.location.href='{{ route('peraturan_organisasi.index') }}'" class="btn btn-primary">
                ← Kembali ke Daftar peraturan_organisasi
            </button>
        </div>

        <!-- Header  -->
        <div class="card mb-4" style="background-image: url('{{ asset('storage/' . $peraturan_organisasi->banner) }}'); background-size: cover; background-position: center;border: none; border-radius: 10px;">
            <div class="card-body d-flex flex-column justify-content-end" style="background: rgba(0, 0, 0, 0.6); height: 100%; border-radius: 10px;">
                <p class="text-muted mb-0">By: {{ $peraturan_organisasi->creator->full_name ?? 'Admin' }}</p>
                <p class="text-muted">Published: {{ $peraturan_organisasi->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="card" style="background-color: #2A2A2A; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <!-- Info peraturan_organisasi -->
                    <div class="col-md-4">
                        <h5 class="text-muted fw-bold">Detail peraturan_organisasi</h5>
                        <p class="text-white"><strong>Bulan:</strong> {{ $peraturan_organisasi->bulan }}</p>
                        <p class="text-white"><strong>Jumlah:</strong> {{ $peraturan_organisasi->jumlah }}</p>
                        <p class="text-white"><strong>Keterangan:</strong> {{ $peraturan_organisasi->keterangan }}</p>
                    </div>
                    <!-- Deskripsi -->
                    <!-- <div class="col-md-8">
                        <h5 class="text-muted fw-bold">Deskripsi</h5>
                        <div class="text-white">
                            {!! $peraturan_organisasi->deskripsi_peraturan_organisasi !!}
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
