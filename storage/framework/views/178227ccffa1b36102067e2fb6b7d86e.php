<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #D1D1D1;">
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card" onclick="redirectToAnggota()" style="cursor: pointer;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="text-success mb-0">Anggota</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-account-outline icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal"><?php echo e($totalAnggota); ?></h6>
                </div>
            </div>
        </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card" onclick="redirectToPengurus()" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 text-warning">Pengurus</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-warning">
                          <span class="mdi mdi-account-multiple-outline icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <!-- <h6 class="text-muted font-weight-normal"></h6> -->
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card" onclick="redirectUsahaAnggota()" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="text-primary mb-0">Usaha</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary">
                          <span class="mdi mdi-store icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal"><?php echo e($totalUsahaAnggota); ?></h6>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card" onclick="redirectToKegiatan()" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 text-danger">Kegiatan</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger ">
                          <span class="mdi mdi-run icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal"><?php echo e($totalKegiatan); ?></h6>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card" onclick="redirectToBerita()" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0 text-primary">Berita</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary ">
                          <span class="mdi mdi-newspaper icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal"><?php echo e($totalBerita); ?></h6>
                  </div>
                </div>
              </div>
            </div>    
    </div> 
       <!-- Footer -->
       <footer class="footer" style="background-color: #2A2A2A; padding: 10px 0;">
            <div class="container text-center">
                <span class="text-muted d-block text-white">Copyright © digikom.com <?php echo e(date('Y')); ?></span>
                <span class="text-muted d-block text-white">All Rights Reserved</span>
            </div>
        </footer>
</div> 
<?php echo $__env->make( 'components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script>
    function redirectToAnggota() {
        window.location.href = "<?php echo e(route('anggota.index')); ?>";
    }
    function redirectToPengurus() {
        window.location.href = "<?php echo e(route('pengurus.index')); ?>";
    }
    function redirectUsahaAnggota() {
        window.location.href = "<?php echo e(route('usaha.index')); ?>";
    }
    function redirectToKegiatan() {
        window.location.href = "<?php echo e(route('kegiatan.index')); ?>";
    }
    function redirectToBerita() {
        window.location.href = "<?php echo e(route('berita.index')); ?>";
    }
</script>
<?php /**PATH /home/azrayaal/Desktop/codes/starcom/digikom/be/resources/views/index.blade.php ENDPATH**/ ?>