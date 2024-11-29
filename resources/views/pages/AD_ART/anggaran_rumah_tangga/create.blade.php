@include('components.header')
@include('components.sidebar')
@include('components.navbar')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title text-black">Buat anggaran_rumah_tangga Baru</h3>
            <div class="mb-3">
                <button onclick="window.location.href='{{ route('anggaran_rumah_tangga.index') }}'" class="btn btn-primary">
                    ← Kembali ke Daftar anggaran_rumah_tangga
                </button>
            </div>
        </div>
        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                <form action="{{ route('anggaran_rumah_tangga.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="bulan" class="text-white" style="font-weight: bold;">Bulan</label>
                        <input type="text" class="form-control text-white" name="bulan" id="bulan" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah" class="text-white" style="font-weight: bold;">Jumlah</label>
                        <input type="number" class="form-control text-white" name="jumlah" id="jumlah" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan" class="text-white" style="font-weight: bold;">keterangan</label>
                        <input type="text" class="form-control text-white" name="keterangan" id="keterangan" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan anggaran_rumah_tangga</button>
                </form>
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