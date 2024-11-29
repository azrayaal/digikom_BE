@include('components.header')
@include('components.sidebar')
@include('components.navbar')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title text-black">Buat iuran Baru</h3>
            <div class="mb-3">
                <button onclick="window.location.href='{{ route('iuran.index') }}'" class="btn btn-primary">
                    ← Kembali ke Daftar iuran
                </button>
            </div>
        </div>
        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                <form action="{{ route('iuran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_iuran" class="text-white" style="font-weight: bold;">Nama iuran</label>
                        <input type="text" class="form-control text-white" name="nama_iuran" id="tittle" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_iuran" class="text-white" style="font-weight: bold;">Tanggal iuran</label>
                        <input type="date" class="form-control" name="tanggal_iuran" id="tanggal_iuran" required>
                    </div>

                    <div class="form-group">
                        <label for="waktu_iuran" class="text-white" style="font-weight: bold;">Waktu iuran</label>
                        <input type="time" class="form-control" name="waktu_iuran" id="waktu_iuran" required>
                    </div>

                    <div class="form-group">
                        <label for="lokasi_iuran" class="text-white" style="font-weight: bold;">Lokasi iuran</label>
                        <textarea class="form-control text-white" name="lokasi_iuran" id="lokasi_iuran" rows="2" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_iuran" class="text-white" style="font-weight: bold;">Deskripsi iuran</label>
                        <textarea class="form-control text-white" name="deskripsi_iuran" id="deskripsi_iuran" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan iuran</button>
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