@include('components.header')
@include('components.sidebar')
@include('components.navbar')

    
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title text-black">Kegiatan:</h3>
            <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Create New Kegiatan</a>
        </div>
        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                <div class="mb-4">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                    <form action="{{ route('kegiatan.index') }}" method="GET" class="">
                        <select name="per_page" onchange="this.form.submit()" class="form-control text-white">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>Show 10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>Show 25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>Show 50</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>Show 100</option>
                        </select>
                    </form>

                    <form action="{{ route('kegiatan.index') }}" method="GET" class="d-flex align-items-center">
                        <input type="text" name="search" class="form-control" placeholder="Cari kegiatan..." value="{{ request('search') }}" onfocus="this.style.backgroundColor='#2A3038'; this.style.color='#ffffff';">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>
                </div>

                </div>
                    <table class="table table-hover text-white">
                        <thead>
                            <tr style="background-color: #D1D1D1;">
                                <th style="color: black;">No</th>
                                <th style="color: black;">  <a href="{{ route('kegiatan.index', array_merge(request()->all(), ['sort_by' => 'nama_kegiatan', 'order' => request('order') === 'asc' ? 'desc' : 'asc'])) }}" style="color: black;   text-decoration: none!important;">
                                    Nama Kegiatan <span class="mdi mdi-arrow-expand
                                {{ request('order') === 'asc' ? 'asc' : 'desc' }}"></span>
                                </a></th>
                                <th style="color: black;">  <a href="{{ route('kegiatan.index', array_merge(request()->all(), ['sort_by' => 'tanggal_kegiatan', 'order' => request('order') === 'asc' ? 'desc' : 'asc'])) }}" style="color: black;   text-decoration: none!important;">
                                Tanggal Kegiatan <span class="mdi mdi-arrow-expand
                                {{ request('order') === 'asc' ? 'asc' : 'desc' }}"></span>
                                </a></th>
                                <th style="color: black;">  <a href="{{ route('kegiatan.index', array_merge(request()->all(), ['sort_by' => 'waktu_kegiatan', 'order' => request('order') === 'asc' ? 'desc' : 'asc'])) }}" style="color: black;   text-decoration: none!important;">
                                Waktu Kegiatan <span class="mdi mdi-arrow-expand
                                {{ request('order') === 'asc' ? 'asc' : 'desc' }}"></span>
                                </a></th>
                                <th style="color: black;">Lokasi Kegiatan</th>
                                <th style="color: black;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $item)
                            <tr onclick="location.href='{{ route('kegiatan.show', $item->id) }}'" style="cursor: pointer;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ $item->tanggal_kegiatan }}</td>
                                <td>{{ $item->waktu_kegiatan }}</td>
                                <td>{{ $item->lokasi_kegiatan }}</td>
                                <td>
                                    <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($kegiatan->isEmpty())
                    <p class="text-center text-muted mt-3">Tidak ada kegiatan yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $kegiatan->links('pagination::bootstrap-4') }}
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


        <!-- main-panel ends -->

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

<style>
    /* Efek hover pada baris tabel */
    tbody tr:hover {
        background-color: #2A2A2A; /* Ganti warna latar belakang jika diinginkan */
        color: #ffffff; /* Warna teks menjadi putih */
    }

    /* Pastikan warna teks anak elemen juga berubah */
    tbody tr:hover td, tbody tr:hover a {
        color: #ffffff !important;
    }
</style>

