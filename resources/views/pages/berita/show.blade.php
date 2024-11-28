

  @include('components.header')
@include('components.sidebar')
@include('components.navbar')

    
    <!-- partial -->
    <div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
        <div class="card" style="background-color: #2A2A2A;">
            <div class="card-body">
                <h2 class="text-white">{{ $berita->tittle }}</h2>
                <p class="text-muted">By: {{ $berita->creator->full_name ?? 'Admin' }}</p>
                <p class="text-muted">Published: {{ $berita->created_at->diffForHumans() }}</p>
                <img src="{{ asset('storage/' . $berita->banner) }}" alt="banner" class="img-fluid mb-4" style="border-radius: 5px;">
                <div class="text-white">
                    {!! $berita->content !!}
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © digikom.com 2024</span>
            </div>
    </footer>
    </div>

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
