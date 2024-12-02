@include('components.header')
@include('components.sidebar')
@include('components.navbar')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title text-black">Buat Berita Baru</h3>
            <div class="mb-3">
                <button onclick="window.location.href='{{ route('berita.index') }}'" class="btn btn-primary">
                    ← Kembali ke Daftar Berita
                </button>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tittle" class="text-white">Judul Berita</label>
                            <input type="text" class="form-control text-white" name="tittle" id="tittle" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="banner" class="text-white">Gambar Banner</label>
                            <input type="file" class="form-control" name="banner" id="banner" required>
                            @error('banner')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content" class="text-white">Konten Berita</label>
                            <textarea class="form-control text-white" name="content" id="content" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Berita</button>
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