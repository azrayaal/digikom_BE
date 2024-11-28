@include('components.header')
@include('components.sidebar')
@include('components.navbar')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <h3 class="card-title text-black ml-2">Buat kegiatan Baru</h3>

        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tittle" class="text-white">Judul kegiatan</label>
                            <input type="text" class="form-control text-white" name="tittle" id="tittle" required>
                        </div>

                        <div class="form-group">
                            <label for="banner" class="text-white">Gambar Banner</label>
                            <input type="file" class="form-control" name="banner" id="banner" required>
                        </div>

                        <div class="form-group">
                            <label for="content" class="text-white">Konten kegiatan</label>
                            <textarea class="form-control text-white" name="content" id="content" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan kegiatan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include( 'components.footer')