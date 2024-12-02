@include('components.header')
@include('components.sidebar')
@include('components.navbar')

    
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="card-title text-black">usaha:</h3>
            <a href="{{ route('usaha.create') }}" class="btn btn-primary">Create New usaha</a>
        </div>
        <div class="col grid-margin stretch-card">
            <div class="card" style="background-color: #2A2A2A;">
                <div class="card-body">
                <div class="mb-4">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                    <form action="{{ route('usaha.index') }}" method="GET" class="">
                        <select name="per_page" onchange="this.form.submit()" class="form-control text-white">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>Show 10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>Show 25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>Show 50</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>Show 100</option>
                        </select>
                    </form>

                    <form action="{{ route('usaha.index') }}" method="GET" class="d-flex align-items-center">
                        <input type="text" name="search" class="form-control" placeholder="Cari usaha..." value="{{ request('search') }}" onfocus="this.style.backgroundColor='#2A3038'; this.style.color='#ffffff';">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>
                </div>

                <table class="table table-hover text-white">
                    <thead>
                        <tr style="background-color: #D1D1D1;">
                            <th style="color: black;">No</th>
                            <th style="color: black;">Nama Usaha</th>
                            <th style="color: black;">Waktu Operational</th>
                            <th style="color: black;">Lokasi Usaha</th>
                            <th style="color: black;">Nomor Usaha</th>
                            <th style="color: black;">Pemilik</th>
                            <th style="color: black;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usaha as $item)
                        <tr onclick="location.href='{{ route('usaha.show', $item->id) }}'" style="cursor: pointer;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_usaha }}</td>
                            <td>{{ $item->waktu_operational }}</td>
                            <td>{{ $item->lokasi_usaha }}</td>
                            <td>{{ $item->nomor_usaha }}</td>
                            <td>{{ $item->creator->full_name ?? 'Tidak Ada Jabatan' }}</td>
                            <td>
                                <a href="{{ route('usaha.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('usaha.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus usaha ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($usaha->isEmpty())
                <p class="text-center text-muted mt-3">Tidak ada usaha yang tersedia.</p>
                @endif
                </div>
            </div>
        </div>

    </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $usaha->links('pagination::bootstrap-4') }}
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

