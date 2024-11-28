@include('components.header')
@include('components.sidebar')
@include('components.navbar')

<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <h3 class="card-title text-black ml-2">Edit Berita</h3>

        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tittle" class="text-white">Judul Berita</label>
                            <input type="text" class="form-control" name="tittle" id="tittle" value="{{ $berita->tittle }}" required>
                        </div>

                        <div class="form-group">
                            <label for="banner" class="text-white">Gambar Banner</label>
                            <input type="file" class="form-control" name="banner" id="banner">
                        </div>

                        <div class="form-group">
                            <label for="content" class="text-white">Konten Berita</label>
                            <textarea class="form-control" name="content" id="content" rows="5" required>{{ $berita->content }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Berita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include( 'components.footer')