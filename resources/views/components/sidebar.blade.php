   <!-- partial:partials/_sidebar.html -->
   <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top " >
          <div class="">
            <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('assets/digikomLogo.png') }}" alt="logo"  style="width: 50px; height: 50px; "/></a>
          </div>
          <div class="">
            <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/digikomLogo.png') }}" alt="logo" style="width: 50px; height: 50px"/></a>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{ asset('templateViews/template/assets/images/faces/face15.jpg') }}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Anggota</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/anggota">Daftar Anggota </a></li>
                <li class="nav-item"> <a class="nav-link" href="/pengurus">Pengurus</a></li>
                <li class="nav-item"> <a class="nav-link" href="/jabatan">Jabatan</a></li>
                <li class="nav-item"> <a class="nav-link" href="/usaha-anggota">Usaha Anggota</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/iuran">
              <span class="menu-icon">
                <i class="mdi mdi-cash-multiple"></i>
              </span>
              <span class="menu-title">Iuran</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/kegiatan">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Kegiatan</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/berita">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Berita</span>
            </a>
          </li>
          <li class="nav-item menu-items">
              <a class="nav-link" data-toggle="collapse" href="#ad_art" aria-expanded="false" aria-controls="ad_art">
                  <span class="menu-icon">
                      <i class="mdi mdi-playlist-play"></i>
                  </span>
                  <span class="menu-title">AD ART</span>
                  <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ad_art">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <!-- Menggunakan rute Laravel untuk mengarahkan ke halaman baru -->
                          <a class="nav-link" href="{{ route('anggaran-dasar.index') }}">Anggaran Dasar</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('anggaran-rumah-tangga.index') }}">Anggaran Rumah Tangga</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('peraturan-organisasi.index') }}">Peraturan Organisasi</a>
                      </li>
                  </ul>
              </div>
          </li>



        </ul>
      </nav>


      <script>
    $(document).ready(function() {
        // Cek apakah collapse sudah terbuka
        if(localStorage.getItem('ad_art_open') === 'true') {
            $('#ad_art').addClass('show');
        }

        // Simpan status collapse di localStorage saat menu diklik
        $('#auth').on('show.bs.collapse', function() {
            localStorage.setItem('ad_art_open', 'true');
        });

        $('#auth').on('hide.bs.collapse', function() {
            localStorage.setItem('ad_art_open', 'false');
        });
    });
</script>
<script>
    $(document).ready(function() {
        if(window.location.href.indexOf("anggaran-dasar") !== -1) {
            $('#ad_art').addClass('show');
        }
    });
</script>
