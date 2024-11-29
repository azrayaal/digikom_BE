@include('components.header')
@include('components.sidebar')
@include('components.navbar')

<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title text-black">Edit peraturan_organisasi "{{ $peraturan_organisasi->nama_peraturan_organisasi }}"</h3>
            <div class="mb-3">
                <button onclick="window.location.href='{{ route('peraturan_organisasi.index') }}'" class="btn btn-primary">
                    ← Kembali ke Daftar peraturan_organisasi
                </button>
            </div>
        </div>
        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                    <form action="{{ route('peraturan_organisasi.update', $peraturan_organisasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="bulan" class="text-white" style="font-weight: bold;">Bulan</label>
                            <input  type="text"
                            class="form-control"
                            name="bulan"
                            id="bulan"
                            value="{{ $peraturan_organisasi->bulan }}" 
                            onfocus="this.style.backgroundColor='#2A3038'; this.style.color='#ffffff';"
                            required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah" class="text-white" style="font-weight: bold;">Jumlah</label>
                            <input  type="text" 
                            class="form-control" 
                            name="jumlah" 
                            id="jumlah" 
                            value="{{ $peraturan_organisasi->jumlah }}" 
                            onfocus="this.style.backgroundColor='#2A3038'; this.style.color='#ffffff';"
                            required>
                        </div>

                        <div class="form-group">
                            <label for="keterangan" class="text-white" style="font-weight: bold;">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="5" 
                            value="{{ $peraturan_organisasi->nama_peraturan_organisasi }}" 
                            onfocus="this.style.backgroundColor='#2A3038'; this.style.color='#ffffff';"
                            required>{{ $peraturan_organisasi->keterangan }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update peraturan_organisasi</button>
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